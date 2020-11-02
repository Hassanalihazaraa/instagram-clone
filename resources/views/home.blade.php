@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 pt-2">
                <img
                    src="https://scontent-bru2-1.cdninstagram.com/v/t51.2885-19/s320x320/38194989_303893960417449_3206698221862649856_n.jpg?_nc_ht=scontent-bru2-1.cdninstagram.com&_nc_ohc=pK-uZMmCTwIAX8wv1K8&oh=a6f362fbc51e9624e56181b145a2c4be&oe=5FC7C111"
                    class="rounded-circle" width="200px" height="200px">
            </div>
            <div class="col-9 pt-2">
                <div class="pb-2 d-flex justify-content-between">
                    <h1>{{$user->username}}</h1>
                    <a href="#">Add a new post</a>
                </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>46</strong>posts</div>
                    <div class="pr-5"><strong>281</strong>followers</div>
                    <div class="pr-5"><strong>226</strong>followings</div>
                </div>
                <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
                <div class="pt-4 font-weight-bold">{{$user->profile->bio}}</div>
                <div class="pt-4 font-weight-bold">{{$user->profile->url}}</div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-3">
                <img
                    src="https://scontent-bru2-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/c131.0.818.818a/s640x640/42429223_2113831758946371_3636827782906710534_n.jpg?_nc_ht=scontent-bru2-1.cdninstagram.com&_nc_cat=103&_nc_ohc=HMWt5yzPVg4AX_h8Jsa&oh=6a6f03b0a65d8f825f72726f36f70501&oe=5FCB3783"
                    class="w-100">
            </div>
            <div class="col-3">
                <img
                    src="https://scontent-bru2-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/s640x640/42002778_240884236572435_6897771415476994744_n.jpg?_nc_ht=scontent-bru2-1.cdninstagram.com&_nc_cat=103&_nc_ohc=i_WQF83uH30AX8KbeKd&_nc_tp=24&oh=ab52efecb1dd6c535716dd05a6d3104c&oe=5FC87924"
                    class="w-100">
            </div>
            <div class="col-3">
                <img
                    src="https://scontent-bru2-1.cdninstagram.com/v/t51.2885-15/sh0.08/e35/c135.0.810.810a/s640x640/34610305_921807641314381_6089522872718458880_n.jpg?_nc_ht=scontent-bru2-1.cdninstagram.com&_nc_cat=101&_nc_ohc=XjrZafaIt08AX8nwpFJ&oh=4e9ad20054487453686a5641cdd4c1fd&oe=5FCA0371"
                    class="w-100">
            </div>
        </div>
    </div>
@endsection
