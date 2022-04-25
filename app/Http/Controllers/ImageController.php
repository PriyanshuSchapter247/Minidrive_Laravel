<?php

namespace App\Http\Controllers;

use App\Jobs\driveusersJob;
use App\Models\Image;
use App\Models\Share;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageController extends Controller
{

    public function recive()
    {

        if (Auth::user()->id) {
            $u = Auth::user();
            $result = Share::where(['user_id' => $u->id])->get();
//            $image ['send_by'] = ($u['id']);
//       dd($result);
//            return view('image.receive', compact('u', 'result'));
            $data = [];
            $data['name'] = auth()->user()->name;
            $data['email'] = auth()->user()->email;
            dispatch(new driveusersJob($data));
            return view('image.receive', compact('u', 'result'));
        }
    }


    public function index(request $request)
    {
//     if (Auth::user()->id){

            $image =Image::where(['upload_by'=>Auth::user()->id])->get();
//            $image =Image::all();
              $all_user= User::all();
            return view('image.index', compact('image','all_user'));
        }
//     }

    public function add()
    {

        $image = Image::all();
        return view('image.add', compact([ 'image']));
    }

    public function insert(request $request)
    {
        $u = Auth::user();
        $image = new Image();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/images', $filename);
            $image->image = $filename;
        }
        $image->title = $request->input('title');
        $image ['slug'] = Str::slug($image['title'], '-');
        $image ['upload_by'] = ($u['id']);
        $image->save();
        return redirect('image')->with('Success', "Image Added Successfully");
    }

    public function edit($id)
    {
        $image = Image::find($id);
        return view('image.edit', compact('image'));
    }


    public function update( $request, $id)
    {
        $image = Image::find($id);

        if ($request->hasFile('image')) {
            $path = 'assets/images/' . $image->image;
            if (file::exists($path)) {
                file::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/images/', $filename);
            $image->image = $filename;
        }
        $image->title = $request->input('title');
        $image->save();
        return redirect()->route('image')->with('status', "image Update Successfully");

    }

    public function destroy($id)
    {
        $image = Image::find($id);
        $path = 'assets/images/' . $image->image;
        if (file::exists($path)) {
            file::delete($path);
        }
        $image->delete();
        return redirect()->route('image')->with('status',"image deleted successfully");

    }


    public function details( request $request)
    {
        $image =Image::all();
        $all_user= User::all();
//        $array = data($image,$all_user);
        return view('image.details', compact('image','all_user'));
    }

    public function trash()
    {
        $image =Image::all();
        $all_user= User::all();
        return view('image.trash', compact('image','all_user'));
    }
}
