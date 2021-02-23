<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::get();
        $category = Category::find($user->profile->category_id);

        return view('user.profile.index', compact(['user', 'categories', 'category']));
    }

    public function show(Profile $profile)
    {
        $user = Auth::user();
        $categories = Category::get();
        $subject = Category::where('id', $profile->category_id)->firstOrFail();

        return view('user.profile.show', compact(['profile', 'user', 'categories', 'subject']));
    }

    public function edit(Profile $profile)
    {
        $user = Auth::user();
        $categories = Category::get();
        $subject = Category::where('id', $profile->category_id)->firstOrFail();

        return view('user.profile.show', compact(['profile', 'user', 'categories', 'subject']));
    }

    public function store(ProfileRequest $request, Profile $profile)
    {
        $profile = new Profile($request->except(['profile_picture']));

        $profile->bio = $request->bio;
        $profile->school = $request->school;
        $profile->category_id = $request->category_id;
        $profile->user_id = Auth::id();

        $profile->save();

        if($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
            $profile->addMediaFromRequest('profile_picture')->toMediaCollection('profile');
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'school' => 'required|string',
            'bio' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $profile = Profile::where('user_id', Auth::id())->firstOrFail();

        $profile->bio = $request->bio;
        $profile->school = $request->school;
        $profile->category_id = $request->category_id;
        $profile->user_id = Auth::id();
        $profile->save();

        if($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
            $profile->addMediaFromRequest('profile_picture')->toMediaCollection('profile');
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
