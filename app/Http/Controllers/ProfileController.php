<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);
        
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'nullable|url',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile', 'public');
            $data['image'] = $imagePath;
        }

        $user->profile->update($data);

        return redirect()->route('profile.show', $user->id);
    }
}
