<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\BlessingType;
use App\Models\UserForm;
use App\Models\UserFormBlessing;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonationConfirmation;
use Illuminate\Support\Facades\Storage;
use App\Models\GalleryImage;

class IndexController extends Controller
{
    public function showIndex()
    {
        $users = User::all();
        $galleryImages = GalleryImage::all();
        $categories = GalleryImage::select('category')->distinct()->pluck('category');
        return view('index', compact('users', 'galleryImages', 'categories'));
    }

    public function showPrayer()
    {
        $blessingTypes = BlessingType::all();
        $users = User::all();
        $galleryImages = GalleryImage::all();
        $categories = GalleryImage::select('category')->distinct()->pluck('category');
        return view('prayer', compact('blessingTypes', 'users', 'galleryImages', 'categories'));
    }


    public function showProfile()
    {
        $userId = auth()->user()->id;
        $userForms = UserForm::where('user_id', $userId)->paginate(10);
        $blessingTypes = BlessingType::all()->keyBy('id');

        $userFormIds = $userForms->pluck('id');
        $userFormBlessings = UserFormBlessing::whereIn('user_form_id', $userFormIds)->get();

        $answers = $userFormBlessings->groupBy('blessing_type_id')->map(function ($item) {
            return $item->first();
        });

        return view('profile', compact('userForms', 'blessingTypes', 'answers'));
    }


    public function showDonation()
    {
        $blessingTypes = BlessingType::all();
        $users = User::all();
        return view('donation.donate', compact('blessingTypes', 'users'));
    }


    public function previewDonation(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'surname' => 'required|string|max:255',
            'givenName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'contact' => 'required|string|digits_between:10,11',
            'amount' => 'required|numeric|min:1',
            'answers' => 'required|array',
            'answers.*.answer' => 'nullable|string',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData->errors())->withInput();
        }

        $data = $validatedData->validated();

        $blessingTypes = BlessingType::all()->keyBy('id');

        $answers = array_map(function ($type) use ($data) {
            return isset($data['answers'][$type->id]) ? $data['answers'][$type->id]['answer'] : '';
        }, $blessingTypes->all());

        return view('donation.preview', [
            'data' => $data,
            'blessingTypes' => $blessingTypes,
            'answers' => $answers
        ]);
    }



    public function submitDonation(Request $request)
    {
        Log::info('Donation Request: ' . json_encode($request->all()));

        // Validate the input
        $validatedData = Validator::make($request->all(), [
            'surname' => 'required|string|max:255',
            'givenName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'contact' => 'required|string|digits_between:10,11',
            'amount' => 'required|numeric|min:1',
            'answers' => 'required|array',
            'answers.*.answer' => 'nullable|string',
        ]);

        if ($validatedData->fails()) {
            return response()->json(['success' => false, 'errors' => $validatedData->errors()]);
        }

        $data = $validatedData->validated();

        $user = Auth::user();
        $userId = optional($user)->id;

        DB::beginTransaction();
        try {
            $userForm = UserForm::create([
                'user_id' => $userId,
                'surname' => $data['surname'],
                'givenName' => $data['givenName'],
                'address' => $data['address'],
                'email' => $data['email'],
                'contact' => $data['contact'],
                'amount' => $data['amount'],
            ]);

            if (isset($data['answers'])) {
                foreach ($data['answers'] as $blessingTypeId => $answerData) {
                    $answer = $answerData['answer'] ?? '';

                    $blessing = new UserFormBlessing([
                        'user_form_id' => $userForm->id,
                        'blessing_type_id' => $blessingTypeId,
                        'answer' => $answer,
                    ]);
                    $blessing->save();
                }
            }

            $imagePath = null;
            if ($request->hasFile('donationImage')) {
                $imagePath = $request->file('donationImage')->store('donations');
            }

            Mail::to($request->input('email'))->send(new DonationConfirmation($userForm, $imagePath));

            DB::commit();
            $redirectUrl = route('thankyou', ['userFormId' => $userForm->id]);
            return response()->json(['success' => true, 'message' => 'Donation successfully processed.', 'redirectUrl' => $redirectUrl]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error occurred: ' . $e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return response()->json(['success' => false, 'message' => 'An error occurred while processing the donation.']);
        }
    }


    public function thankyou(Request $request)
    {
        $userFormId = $request->query('userFormId');
        $userForm = UserForm::find($userFormId);


        return view('donation.thankyou', compact('userForm'));
    }
}
