<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function update(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Máx 2MB
        ]);

        // Obtain the authenticated user
        $user = $request->user();

        // Delete the old avatar if it exists
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Store the new avatar in the "public/avatars" directory
        $path = $request->file('avatar')->store('avatars', 'public');

        // Update DB
        $user->update(['avatar' => $path]);

        // Redirect back with success message
        return back()->with('status', '¡Foto de perfil actualizada!');
    }
}
