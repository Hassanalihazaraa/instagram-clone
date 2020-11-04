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
                            <img src="{{$posts->user->profile->profileImage()}}" class="rounded-circle w-100" alt=""
                                 style="max-width: 40px;">
                        </div>
                        <div>
                            <div class="font-weight-bold d-flex">
                                <a href="/profile/{{$posts->user->id}}" class="mt-2">
                                    <span class="text-dark">{{$posts->user->username}}</span>
                                </a>
                                {{-- @todo this follow button doesn't work --}}
                                <follow-button user-id="{{$posts->user->id}}" follows="{{$follows}}"></follow-button>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{$posts->user->id}}" class="pr-2">
                                <span class="text-dark">{{$posts->user->username}}</span>
                            </a>
                        </span>
                        {{$posts->caption }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

