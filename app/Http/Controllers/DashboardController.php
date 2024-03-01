<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BlessingType;
use App\Models\UserForm;
use App\Models\UserFormBlessing;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;



class DashboardController extends Controller
{
    public function show()
    {
        $users = User::latest()->take(5)->get();
        $blessingTypes = BlessingType::latest('created_at')->take(5)->get();
        $userForms = UserForm::with('user')->latest()->take(5)->get();
        $userFormBlessings = UserFormBlessing::latest()->take(5)->get();

        $totalUsers = User::count();
        $totalFormsSubmitted = UserForm::count();
        $totalAmountCollected = UserForm::sum('amount');

        return view('dashboard.dashboard', compact('blessingTypes', 'users', 'userForms', 'userFormBlessings', 'totalUsers', 'totalFormsSubmitted', 'totalAmountCollected'));
    }


    public function showDonationSubmissions(Request $request)
    {
        $query = UserForm::query();

        if ($request->filled('transaction_id')) {
            $query->where('id', $request->input('transaction_id'));
        }
        if ($request->filled('surname')) {
            $query->where('surname', 'like', '%' . $request->input('surname') . '%');
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }
        if ($request->filled('contact')) {
            $query->where('contact', 'like', '%' . $request->input('contact') . '%');
        }
        $userForms = $query->paginate(10);

        return view('dashboard.donation-submission', compact('userForms'));
    }



    public function showFormDetails($userFormId)
    {
        $userForm = UserForm::find($userFormId);
        $blessingTypes = BlessingType::all()->keyBy('id');

        $userFormBlessings = UserFormBlessing::where('user_form_id', $userForm->id)->get();

        $answers = $userFormBlessings->groupBy('blessing_type_id')->map(function ($item) {
            return $item->first();
        });

        return view('details.form', compact('userForm', 'blessingTypes', 'answers'));
    }


    public function showFullDetails($userFormId)
    {
        $userForm = UserForm::with(['user', 'userFormBlessings.blessingType'])->findOrFail($userFormId);

        return view('details.full', compact('userForm'));
    }


    public function showPrayers()
    {
        $blessingTypes = BlessingType::all();
        return view('dashboard.prayers', compact('blessingTypes'));
    }


    public function showUsers(Request $request)
    {
        $query = User::query();

        if ($request->filled('surname')) {
            $query->where('surname', 'like', '%' . $request->surname . '%');
        }
        if ($request->filled('givenName')) {
            $query->where('givenName', 'like', '%' . $request->givenName . '%');
        }
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }
        if ($request->filled('contact')) {
            $query->where('contact', 'like', '%' . $request->contact . '%');
        }

        $users = $query->paginate(10);

        return view('dashboard.users', compact('users'));
    }



    public function addPrayerType(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $blessingType = new BlessingType();
        $blessingType->title = $validatedData['title'];
        $blessingType->save();

        return response()->json(['success' => true, 'message' => 'Blessing type added']);
    }



    public function deletePrayerType($id)
    {
        $blessingType = BlessingType::findOrFail($id);
        $blessingType->delete();

        return response()->json([
            'success' => true,
            'message' => 'Blessing type deleted successfully.'
        ]);
    }


    public function updatePrayer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blessings.*.title' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $blessings = $request->input('blessings', []);
        foreach ($blessings as $blessing) {
            $blessingType = BlessingType::find($blessing['id']);
            if ($blessingType) {
                $blessingType->title = $blessing['title'];
                $blessingType->save();
            }
        }

        return response()->json(['success' => true]);
    }

    public function viewBlessingType(Request $request, $id)
    {
        $blessingType = BlessingType::findOrFail($id);
        $query = UserFormBlessing::query()
                ->where('blessing_type_id', $id)
                ->where('answer', '!=', '')
                ->whereNotNull('answer');
        if ($request->filled('transaction_id')) {
            $query->whereHas('userForm', function ($q) use ($request) {
                $q->where('id', $request->transaction_id);
            });
        }
        if ($request->filled('name')) {
            $query->whereHas('userForm', function ($q) use ($request) {
                $q->whereRaw("CONCAT(surname, ' ', givenName) LIKE ?", ["%{$request->name}%"]);
            });
        }
        if ($request->filled('answer')) {
            $query->where('answer', 'LIKE', "%{$request->answer}%");
        }
        $userFormBlessings = $query->paginate(15);
        return view('dashboard.prayer-answer', compact('blessingType', 'userFormBlessings'));
    }



    public function showPrayerAnswer(Request $request)
    {
        $answerIds = $request->input('userFormBlessings', []);
        $answers = UserFormBlessing::whereIn('id', $answerIds)->get();
        $blessingType = $answers->first()->blessingType;
        if ($blessingType) {
            $blessingTypeTitle = $blessingType->title;
        }
        return view('dashboard.prayer-print', compact('answers', 'blessingTypeTitle', 'answerIds'));
    }


    public function downloadPrayerAnswer(Request $request)
    {
        $answerIds = $request->input('answerIds', []);
        UserFormBlessing::whereIn('id', $answerIds)->increment('print_count');
        return response()->json(['message' => 'Print count incremented successfully.']);
    }


    public function showGalleryUploadForm()
    {
        $images = GalleryImage::all();
        return view('dashboard.gallery-upload', compact('images'));
    }

    public function uploadGalleryImage(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'image' => 'required|image',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'title' => $request->title,
            'category' => $request->category,
            'image' => $path,
        ]);

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    public function showEditGalleryImageForm($id)
    {
        $image = GalleryImage::findOrFail($id);
        return view('dashboard.edit-gallery', compact('image'));
    }

    public function updateGalleryImage(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $image = GalleryImage::findOrFail($id);

        $image->title = $request->title;
        $image->category = $request->category;

        if ($request->hasFile('image')) {
            Storage::delete('public/'.$image->image);

            $path = $request->file('image')->store('gallery', 'public');
            $image->image = $path;
        }

        $image->save();

        return redirect()->route('dashboard.gallery.upload.form')->with('success', 'Image updated successfully.');
    }

    public function deleteGalleryImage($id)
    {
        $image = GalleryImage::findOrFail($id);
        Storage::delete('public/'.$image->image);
        $image->delete();
        return response()->json(['success' => 'Image deleted successfully.']);
    }

}
