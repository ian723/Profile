<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count,posts.' . $user->id, 
            now() ->addSeconds(30), 
            function () use ($user) {
            return $user->posts->count();
        });

        $followersCount = Cache::remember(
            'count,posts.' . $user->id, 
            now() ->addSeconds(30), 
            function () use ($user) {
            return $user->profile->followers->count();
        });
        
        $followingCount = Cache::remember(
            'count,posts.' . $user->id, 
            now() ->addSeconds(30), 
            function () use ($user) {
            return $user->following->count();
        });
        
        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
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
