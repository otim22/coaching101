<?php

namespace App\Http\Controllers\Student;

use App\Models\Year;
use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Constants\GlobalConstants;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::get();
        $years = Year::get();

        if($user->profile) {
            $category = Category::find($user->profile->category_id);
            $year = Year::find($user->profile->year_id);
        } else {
            $category = GlobalConstants::ALL_SUBJECTS;
            $year = GlobalConstants::ALL_YEARS;
        }

        return view('user.profile.index', compact(['user', 'categories', 'category', 'years', 'year']));
    }

    public function store(Request $request, Profile $profile)
    {
        if($request->year_id) {
            $request->validate([
                'school' => 'required|string',
                'year_id' => 'required|integer',
                'phone' => 'required|regex:/(0)[0-9]{9}$/',
                'dob' => 'required|date',
                'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png'
            ]);

            $profile = new Profile($request->except(['profile_picture']));

            $profile->school = $request->school;
            $profile->dob = $request->dob;
            $profile->year_id = $request->year_id;
            $profile->phone = $request->phone;
            $profile->user_id = Auth::id();

            $profile->save();
        } else {
            $request->validate([
                'school' => 'required|string',
                'category_id' => 'required|integer',
                'phone' => 'required|regex:/(0)[0-9]{9}$/',
                'bio' => 'required|string',
                'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png'
            ]);

            $profile = new Profile($request->except(['profile_picture']));

            $profile->phone = $request->phone;
            $profile->bio = $request->bio;
            $profile->school = $request->school;
            $profile->category_id = $request->category_id;
            $profile->user_id = Auth::id();

            $profile->save();
        }

        if($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
            $profile->addMediaFromRequest('profile_picture')->toMediaCollection('profile');
        }

        return redirect()->back()->with('success', 'Profile created successfully.');
    }

    public function update(Request $request)
    {
        if ($request->year_id) {
            $request->validate([
                'school' => 'required|string',
                'year_id' => 'required|integer',
                'phone' => 'required|regex:/(0)[0-9]{9}$/',
                'dob' => 'required|date',
                'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png'
            ]);

            $profile = Profile::where('user_id', Auth::id())->firstOrFail();

            $profile->school = $request->school;
            $profile->dob = $request->dob;
            $profile->year_id = $request->year_id;
            $profile->phone = $request->phone;
            $profile->user_id = Auth::id();

            $profile->save();
        } else {
            $request->validate([
                'school' => 'required|string',
                'category_id' => 'required|integer',
                'phone' => 'required|regex:/(0)[0-9]{9}$/',
                'bio' => 'required|string',
                'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png'
            ]);

            $profile = Profile::where('user_id', Auth::id())->firstOrFail();

            $profile->phone = $request->phone;
            $profile->bio = $request->bio;
            $profile->school = $request->school;
            $profile->category_id = $request->category_id;
            $profile->user_id = Auth::id();

            $profile->save();
        }

        if($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
            foreach ($profile->media as $media) {
                $media->delete();
            }
            $profile->addMediaFromRequest('profile_picture')->toMediaCollection('profile');
        }

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
