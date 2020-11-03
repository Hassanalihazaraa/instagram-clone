@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 pt-2">
                <img src="{{$user->profile->profileImage()}}" class="rounded-circle" width="200px" height="200px"
                     alt="">
            </div>
            <div class="col-9 pt-2">
                <div class="pb-2 d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-2">
                        <div class="h4">{{$user->username}}</div>

                        <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                    </div>

                    @can('update', $user->profile)
                        <a href="/posts/create">Add a new post</a>
                    @endcan
                </div>
                <div>
                    @can('update', $user->profile)
                        <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                    @endcan
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong class="pr-1">{{$user->posts->count()}}</strong>posts</div>
                    <div class="pr-5"><strong class="pr-1">281</strong>followers</div>
                    <div class="pr-5"><strong class="pr-1">226</strong>followings</div>
                </div>
                <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
                <div class="pt-4 font-weight-bold">{{$user->profile->bio}}</div>
                <div class="pt-4 font-weight-bold">{{$user->profile->url}}</div>
            </div>
        </div>
        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-3 pb-4">
                    <a href="/posts/{{$post->id}}">
                        <img src="/storage/{{$post->image}}" class="w-100" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
