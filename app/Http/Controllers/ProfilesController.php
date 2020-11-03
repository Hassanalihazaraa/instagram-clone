<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }


    public function edit(User $user)
    {
        try {
            $this->authorize('update', $user->profile);
            return view('profiles.edit', compact('user'));
        } catch (AuthorizationException $e) {
            echo "You are not allowed to edit this Profile";
        }
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'bio' => 'required',
            'url' => 'url',
            'image' => ''
        ]);
        auth()->user()->profile->update($data);
        return redirect("/profile/{$user->id}");
    }
}
