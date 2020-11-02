<?php

namespace App\Http\Controllers;


class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(): void
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required'
        ]);
        dd(request()->all());
    }
}
