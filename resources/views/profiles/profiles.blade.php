@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>{{ $user->name }}'s profile</p>
                </div>
                <div class="panel-body text-center">
                    <img src="{{ Storage::url($user->avatar) }}" height="70px" width="70px" alt="">
                    <p>{{ $user->profile->location }}</p>
                    <notification :id={{ auth()->id() }}></notification>
                    @if(auth()->check() && auth()->id() == $user->id)
                        <p class="text-center">
                            <a href="{{ route('profile.edit') }}">update profile</a>
                        </p>
                    @endif
                </div>
            </div>
            @if (auth()->id() != $user->id)
            <div class="panel panel-default">
                <div class="panel-body">
                    <profile :profile_user_id="{{ $user->id }}"></profile>
                </div>
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>About</p>
                </div>
                <div class="panel-body">
                    <p>{{ $user->profile->about }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection