<?php

namespace App\Http\Controllers;


use App\Models\Post;
use \Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        //make this entire class authenticated by using the auth key
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $user)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //validate the the caption and image
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image']
        ]);

        //store image to the path public storage upload folder
        $imagePath = request('image')->store('uploads', 'public');

        //resize the image by using intervention/image
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        //if use is logged in then store the caption and image
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);
        //redirect user to profile page if he is logged in
        return redirect('/profile/' . auth()->user()->id);
    }


    public function show(Post $posts)
    {
        //return the view page and by using compact we are retuning the posts
        return view('posts.show', compact('posts'));
    }
}
