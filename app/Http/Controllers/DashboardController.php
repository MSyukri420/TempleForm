<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BlessingType;
use App\Models\UserForm;
use App\Models\UserFormBlessing;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function show()
    {
        $users = User::all();
        $blessingTypes = BlessingType::orderBy('position', 'asc')->get();
        $userForm = UserForm::all();
        $userFormBlessings = UserFormBlessing::all();
        return view('dashboard.dashboard', compact('blessingTypes', 'users', 'userForm', 'userFormBlessings'));
    }

    public function showBlessing()
    {
        $blessingTypes = BlessingType::orderBy('position', 'asc')->get();
        return view('dashboard.blessing', compact('blessingTypes'));
    }

    public function addBlessingType(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $blessingType = new BlessingType();
        $blessingType->title = $validatedData['title'];
        $blessingType->save();

        return response()->json(['success' => true, 'message' => 'Blessing type added']);
    }



    public function deleteBlessingType($id)
    {
        $blessingType = BlessingType::findOrFail($id);
        Log::info('Blessing type deleted: ' . $blessingType->title);
        $blessingType->delete();

        return response()->json([
            'success' => true,
            'message' => 'Blessing type deleted successfully.'
        ]);
    }



    public function updateBlessingType(Request $request, $id)
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
                $blessingType->position = $blessing['position'];
                $blessingType->save();
            }
        }

        return response()->json(['success' => true]);
    }

}
