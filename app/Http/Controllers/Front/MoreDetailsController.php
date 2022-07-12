<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\MoreDetails;
use Illuminate\Http\Request;

class MoreDetailsController extends Controller
{
    public function index()
    {
        $more  = MoreDetails::all();
        return view('profile.more',compact('more'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'place' => 'nullable|string|max:255',
            'user_id' => 'string|max:255',
            // 'email' => 'nullable|email|max:255',
            // 'phone' => 'required|string|min:10|unique:client_profiles',
            'gender' => 'nullable|string|max:255',
            // 'facebook' => 'nullable|url|max:255',
            // 'instagram' => 'nullable|url|max:255',
            // 'linkedin' => 'nullable|url|max:255',
            // 'source' => 'nullable|string|max:255',
            // 'profession' => 'nullable|string|max:255',
            // 'malayali' => 'nullable|string|max:255',
        ]);

        $client  = new MoreDetails();
        $client->place = $request->place;
        $client->sex = $request->gender;
        $user_login_id = auth()->id();
        $client->user_id = $user_login_id;
        $client->save();
        // dd('working');
        return redirect()->route('profile')->with('success', 'Your details added successfully !');
    }
}
