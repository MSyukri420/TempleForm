<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            Log ::info('User logged in: ' . Auth::user()->name);
            return response()->json(['success' => true]);
        }

        Log::info('User login failed: ' . $request->email);
        return response()->json([
            'success' => false,
            'message' => 'The provided credentials do not match our records.'
        ], 401);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the user's session.
        $request->session()->invalidate();

        // Regenerate the session ID to prevent session fixation.
        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function register(Request $request)
    {
        Log::info('Register request: ' . json_encode($request->all()));
        $validator = Validator::make($request->all(), [
            'surname' => 'required|string|max:255',
            'givenName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'surname' => $request->surname,
            'givenName' => $request->givenName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'contact' => $request->contact,
        ]);

        Auth::login($user);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful.',
            'redirectUrl' => url('/')
        ]);
    }
}
