@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="location">Upload avatar</label>
                            <input type="file" name="avatar" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ $info->location }}">
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea name="about" id="about" cols="30" rows="10" class="form-control">{{ $info->about }}</textarea>
                        </div>
                        <div class="form-group">
                            <p class="text-center">
                            <button class="btn btn-primary btn-lg" type="submit">save profile info</button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
