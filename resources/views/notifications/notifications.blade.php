@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p>All Notifications</p>
            </div>
            <div class="panel-body">
                <ul>
                    @foreach($notifications as $notification)
                        <li>
                            {{ $notification->data['name'] }} &nbsp; {{ $notification->data['message'] }}
                            <span class="pull-right"> {{ $notification->created_at->diffForHumans() }} </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection