@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p>{{ $user->name }}'s profile</p>
                </div>
                <div class="panel-body">
                    <img src="{{ Storage::url($user->avatar) }}" height="70px" width="70px" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection