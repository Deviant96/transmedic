<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'driver_license_number' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $user = User::create([
                'name' => $validated['name'],
                'address' => $validated['address'],
                'phone_number' => $validated['phone_number'],
                'driver_license_number' => $validated['driver_license_number'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);
            return redirect()->back()->with('message', 'User registered successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to register user.']);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            session(['user_id' => $user->id]);
            return response()->json(['message' => 'Logged in successfully']);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout()
    {
        session()->forget('user_id');
        return response()->json(['message' => 'Logged out successfully']);
    }
}
