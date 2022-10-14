<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloodgroup = [
            'A+' => 'A+',
            'A-' => 'A-',
            'B+' => 'B+',
            'B-' => 'B-',
            'O+' => 'O+',
            'O-' => 'O-',
            'AB+' => 'AB+',
            'AB-' => 'AB-',
        ];
        return view('profile.index')->with('bloodgroup', $bloodgroup)->with('user', Auth::user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'bloodgroup' => 'required',
        ]);

        $path = $request->file('image')->store('public/profiles');
        $storagepath = Storage::path($path);
        $img = Image::make($storagepath);
        // resize image instance
        $img->resize(320, 320);
        // insert a watermark
        // $img->insert('public/watermark.png');
        // save image in desired format
        $img->save($storagepath);

        $u = User::find(Auth::id());
        $p = new Profile();      
        $p->fullname = $request->fullname;
        $p->phone = $request->phone;
        $p->address = $request->address;
        $p->bloodgroup = $request->bloodgroup;
        $p->image = $path;
        if($u->profile()->save($p)){
            return back()->with('message',"Your profile has been Created!!!");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'bloodgroup' => 'required',
        ]);

        $path = $request->file('image')->store('public/profiles');
        $storagepath = Storage::path($path);
        $img = Image::make($storagepath);

        // resize image instance
        $img->resize(320, 320);

        // insert a watermark
        // $img->insert('public/watermark.png');

        // save image in desired format
        $img->save($storagepath);

        $u = User::find(Auth::id());
        $p = $u->profile;
        if($p->image){
            Storage::delete($p->image);
        }
        $p->fullname = $request->fullname;
        $p->phone = $request->phone;
        $p->address = $request->address;
        $p->bloodgroup = $request->bloodgroup;
        $p->image = $path;
        if($u->profile()->save($p)){
            return back()->with('message',"Your profile has been updated!!!");
        }
    }
}
