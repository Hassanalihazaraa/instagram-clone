<?php

namespace App\Http\Controllers;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(): void
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);

        dd(request('image')->store('uploads', 'public'));

        auth()->user()->posts()->create($data);
        dd(request()->all());
    }
}
