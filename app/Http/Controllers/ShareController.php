<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Share;
use App\Models\User;
use App\Notifications\MinidriveNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class ShareController extends Controller
{
    public function share(Request $request, $id)
    {
        $image = Image::find($id);
        $all_user = User::all();

//        dd($request);
        return view('image.share', compact('image', 'all_user'));
    }


    public function send(request $request, $id)
    {
        $user = User::get();
        Notification::send($user, new MinidriveNotification);
        $image = Image::find($id);
        $user = User::where(['email' => $request->Per])->first();
//        dd('done');
        return redirect('image')->with('status', 'image share successfully');
    }


    public function request()
    {

//        $this->middleware('auth');
//        $user = User::findOrFail($id);
        $u = Auth::user();
//        $image = Image::where(['user_id', $u->id])->get();
        return view('image.request')->with('status', 'you have not authorized to access this image');

//        else{
//            return view('image.index')->with('status', 'you have authorized to access this image');
//        }


    }
}
