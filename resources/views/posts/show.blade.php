@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$posts->image}}" alt="" class="w-100">
            </div>

            <div class="col-4">
                <div>
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img src="/storage/{{$posts->user->profile->image}}" class="rounded-circle w-100" alt=""
                                 style="max-width: 40px;">
                        </div>
                        <div>
                            <div class="font-weight-bold">
                                <a href="/profile/{{$posts->user->id}}">{{$posts->user->username}}</a>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <p>{{$posts->caption }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

