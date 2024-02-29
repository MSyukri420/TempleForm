<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BlessingType;
use App\Models\UserForm;
use App\Models\UserFormBlessing;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Barryvdh\Snappy\Facades\SnappyImage as Image;
use Barryvdh\Snappy\Facades\SnappyPDF as PDF;



class DashboardController extends Controller
{
    public function show()
    {
        $users = User::latest()->take(5)->get();
        $blessingTypes = BlessingType::orderBy('position', 'asc')->take(5)->get();
        $userForms = UserForm::with('user')->latest()->take(5)->get();
        $userFormBlessings = UserFormBlessing::latest()->take(5)->get();

        $totalUsers = User::count();
        $totalFormsSubmitted = UserForm::count();
        $totalAmountCollected = UserForm::sum('amount');

        return view('dashboard.dashboard', compact('blessingTypes', 'users', 'userForms', 'userFormBlessings', 'totalUsers', 'totalFormsSubmitted', 'totalAmountCollected'));
    }


    public function showDonationSubmissions()
    {
        $users = User::all();
        $userForms = UserForm::paginate(5);
        $userFormBlessings = UserFormBlessing::all();
        return view('dashboard.donation-submission', compact('users', 'userForms', 'userFormBlessings'));
    }

    public function indexDonation(Request $request)
    {
        $transactionId = $request->input('transaction_id');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $contact = $request->input('contact');

        $userForms = UserForm::with('user')
                    ->when($transactionId, function ($query, $transactionId) {
                        return $query->where('id', $transactionId);
                    })
                    ->when($surname, function ($query) use ($surname) {
                        return $query->whereHas('user', function ($query) use ($surname) {
                            $query->where('surname', 'like', "%{$surname}%");
                        });
                    })
                    ->when($email, function ($query) use ($email) {
                        return $query->whereHas('user', function ($query) use ($email) {
                            $query->where('email', 'like', "%{$email}%");
                        });
                    })
                    ->when($contact, function ($query) use ($contact) {
                        return $query->whereHas('user', function ($query) use ($contact) {
                            $query->where('contact', 'like', "%{$contact}%");
                        });
                    })
                    ->paginate(5);

        return view('dashboard.donation-submission', compact('userForms'));
    }



    public function showFormDetails($userFormId)
    {
        $userForm = UserForm::with(['user', 'userFormBlessings.blessingType'])->findOrFail($userFormId);

        // You can pass more data as needed
        return view('details.form', compact('userForm'));
    }


    public function showFullDetails($userFormId)
    {
        $userForm = UserForm::with(['user', 'userFormBlessings.blessingType'])->findOrFail($userFormId);

        // You can pass more data as needed
        return view('details.full', compact('userForm'));
    }


    public function showPrayers()
    {
        $blessingTypes = BlessingType::all();
        return view('dashboard.prayers', compact('blessingTypes'));
    }


    public function showUsers()
    {
        $users = User::paginate(5);
        return view('dashboard.users', compact('users'));
    }

    public function indexUsers(Request $request)
    {
        $query = User::query(); // Start with all users

        // Check if search parameters are present and not empty, then apply filters
        if ($request->has('surname') && $request->surname != '') {
            $query->where('surname', 'like', '%' . $request->surname . '%');
        }

        if ($request->has('givenName') && $request->givenName != '') {
            $query->where('givenName', 'like', '%' . $request->givenName . '%');
        }

        if ($request->has('email') && $request->email != '') {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->has('contact') && $request->contact != '') {
            $query->where('contact', 'like', '%' . $request->contact . '%');
        }

        // Paginate the results
        $users = $query->paginate(5);

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



    public function updatePrayerType(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'position' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $blessingType = BlessingType::findOrFail($id);
        $blessingType->update([
            'title' => $request->title,
            'position' => $request->position,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Blessing type updated successfully.',
        ]);
    }

    public function updateOrder(Request $request)
    {
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

    public function viewBlessingType($id)
    {
        $blessingType = BlessingType::findOrFail($id);
        $allUserFormBlessings = UserFormBlessing::where('blessing_type_id', $id)->get();

        $userFormBlessings = $allUserFormBlessings->filter(function ($blessing) {
            return !empty($blessing->answer);
        });

        return view('dashboard.prayer-answer', compact('blessingType', 'userFormBlessings'));
    }



    public function showPrayerAnswer(Request $request)
    {
        $answerIds = $request->input('userFormBlessings', []);
        $answers = UserFormBlessing::with('blessingType')
                                    ->whereIn('id', $answerIds)
                                    ->get();
        $answerPairs = collect();

        foreach ($answers as $answer) {
            if (in_array($answer->blessingType->id, [1, 2])) {
                $relatedBlessingTypeId = $answer->blessingType->id == 1 ? 2 : 1;
                $relatedAnswer = UserFormBlessing::where('blessing_type_id', $relatedBlessingTypeId)
                                ->where('user_form_id', $answer->user_form_id)
                                ->first();
                if ($relatedAnswer) {
                    $answerPairs->push([$answer, $relatedAnswer]);
                }
            } else {
                $answerPairs->push([$answer]);
            }
        }

        $blessingTypeTitle = $answers->first()->blessingType->title ?? 'Default Title';

        return view('dashboard.prayer-print', compact('answerPairs', 'blessingTypeTitle'));
    }


    public function incrementPrintCount(Request $request)
    {
        $answerIds = $request->input('answerIds', []);
        Log::info('Answer IDs: ' . json_encode($answerIds));
        UserFormBlessing::whereIn('id', $answerIds)->increment('print_count');
        return response()->json(['message' => 'Print count incremented successfully.']);
    }


}
