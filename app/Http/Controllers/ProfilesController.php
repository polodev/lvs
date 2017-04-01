<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index($slug) {
        $user = User::where('slug', $slug)->first();
        return view('profiles.profiles', compact('user'));
    }
    public function edit() {
        $info = Auth::user()->profile;
        return view('profiles.edit', compact('info'));
    }
    public function update(Request $r) {
//        auth()->user()->profile->update([
//            'location' => request('location'),
//            'about' => request('about')
//        ]);
        if($r->hasFile('avatar')) {

            Auth::user()->update([
                'avatar' => $r->avatar->store('public/avatars')
            ]);
        }
        auth()->user()->profile->update([
            'location' => $r->location,
            'about' => $r->about
        ]);
        session()->flash('success', 'profile updated successfully');
        return redirect('home');
    }
}
