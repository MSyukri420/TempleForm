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

class IndexController extends Controller
{
    // Show the contribution page
    public function showIndex()
    {
        $users = User::all();
        return view('index', compact('users'));
    }


    public function showProfile()
    {
        // Assuming you have a UserFormBlessing model set up for your 'user_form_blessings' table
        $userId = auth()->user()->id; // Get the current logged-in user's ID
        $userForms = UserForm::with(['userFormBlessings'])
                    ->where('user_id', $userId)
                    ->get();

        // Pass the data to the profile view
        return view('profile', compact('userForms'));
    }


    // Show the contribution page
    public function showContribution()
    {
        $blessingTypes = BlessingType::all();
        $users = User::all();
        return view('contribution', compact('blessingTypes', 'users'));
    }


    public function showDonation()
    {
        $blessingTypes = BlessingType::all();
        $users = User::all();
        return view('donation.donate', compact('blessingTypes', 'users'));
    }


    public function previewDonation(Request $request)
    {
        // Perform validation as before
        $validatedData = Validator::make($request->all(), [
            'surname' => 'required|string|max:255',
            'givenName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'contact' => 'required|string|digits:11',
            'amount' => 'required|numeric|min:1',
            'answers' => 'required|array',
            'answers.*.answer' => 'required|string',
        ]);

        if ($validatedData->fails()) {
            // Redirect back with errors
            return redirect()->back()->withErrors($validatedData->errors())->withInput();
        }

        // Extract the validated data
        $data = $validatedData->validated();

        // Retrieve the titles of the blessing types
        $blessingTypes = BlessingType::findMany(array_keys($data['answers']))->pluck('title', 'id');

        // Pass the data to the preview view
        return view('donation.preview', ['data' => $data, 'blessingTypes' => $blessingTypes]);
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
            'contact' => 'required|string|digits:11',
            'amount' => 'required|numeric|min:1',
            'answers' => 'required|array',
            'answers.*.answer' => 'required|string',
        ]);

        if ($validatedData->fails()) {
            Log::info('Donation Validation Errors: ' . json_encode($validatedData->errors()));
            return response()->json(['success' => false, 'errors' => $validatedData->errors()]);
        }

        // Extract the validated data
        $data = $validatedData->validated();

        // Get the currently authenticated user
        $user = Auth::user();

        DB::beginTransaction();
        try {
            // Assume you have a UserForm model that handles form submissions
            $userForm = UserForm::create([
                'user_id' => $user->id,
                'surname' => $data['surname'],
                'givenName' => $data['givenName'],
                'address' => $data['address'],
                'email' => $data['email'],
                'contact' => $data['contact'],
                'amount' => $data['amount'],
            ]);

            // Save the blessing types and answers
            if (isset($data['answers'])) {
                foreach ($data['answers'] as $blessingTypeId => $answerData) {
                    // Check if answerData is an array and has an 'answer' key
                    if (is_array($answerData) && isset($answerData['answer'])) {
                        // Create UserFormBlessing for each blessing type and answer
                        $blessing = new UserFormBlessing([
                            'user_form_id' => $userForm->id,
                            'blessing_type_id' => $blessingTypeId,
                            'answer' => $answerData['answer'], // Access the 'answer' key from the answerData array
                        ]);
                        $blessing->save();
                    }
                }
            }

            // Commit the transaction
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Donation successfully processed.']);
        } catch (\Exception $e) {
            // An error occurred; rollback the transaction
            DB::rollBack();
            Log::error('Error occurred: ' . $e->getMessage(), ['stack' => $e->getTraceAsString()]);
            return response()->json(['success' => false, 'message' => 'An error occurred while processing the donation.']);
        }
    }
}
