<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the profile edit page
     */
    public function edit()
    {
        return view('userprofile');
    }

    /**
     * Update the user profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:500'],
        ]);

        // Update the user
        $user->update($validated);

        // Redirect back with success message
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully! 🎉');
    }
}
