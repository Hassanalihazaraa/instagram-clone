<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowController extends Controller
{
    public function store(User $user)
    {
        //authenticated user can connect to the profile
        return auth()->user()->following()->toggle($user->profile);
    }
}
