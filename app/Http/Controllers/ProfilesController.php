<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        //if user is authenticated, he can see the follow button else not
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        //count the posts and cache it for 30 seconds to improve site performance
        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),

            function () use ($user) {
                return $user->posts->count();
            });
        //count the followers and cache it for 30 seconds to improve site performance
        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),

            function () use ($user) {
                return $user->profile->followers->count();
            });

        //count the followings and cache it for 30 seconds to improve site performance
        $followingCount = Cache::remember(
            'count.followings.' . $user->id,
            now()->addSeconds(30),

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

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'bio' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            //if i get errors again with image intervention, i have to install php-gd and restart apache and server
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
