<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    public function index()
    {
        // Obtain the authenticated user's links
        $links = Auth::user()->links;
        return view('dashboard', compact('links'));
    }

    // Create form view
    public function create()
    {
        return view('links.create');
    }

    // Create new link in database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|url',
            'icon' => 'nullable|string'
        ]);
        $request->user()->links()->create($validated);
        return redirect()->route('dashboard')->with('success', 'Link created successfully.');
    }

    // Edit
    public function edit(Link $link)
    {
        // Seguridad: Si el link no es tuyo, error 403
        if ($link->user_id !== Auth::id()) abort(403);

        return view('links.edit', compact('link'));
    }

    // Update
    public function update(Request $request, Link $link)
    {
        if ($link->user_id !== Auth::id()) abort(403);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|url',
            'icon' => 'nullable|string'
        ]);

        $link->update($validated);

        return redirect()->route('dashboard')->with('status', '¡Enlace actualizado!');
    }

    // Delete
    public function destroy(Link $link)
    {
        if ($link->user_id !== Auth::id()) abort(403);

        $link->delete();

        return redirect()->route('dashboard')->with('status', 'Enlace eliminado.');
    }

    // Visit link and increment clicks
    public function visit(Link $link)
    {
        $link->increment('clicks');

        return redirect()->away($link->url);
    }
}
