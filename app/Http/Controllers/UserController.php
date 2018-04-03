<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class UserController extends Controller
{
 
    public function index()
    {
        $userInfo = User::find(Auth::id());
        return view('member.index', ['userInfo'=>$userInfo]);
    }

    public function updateIcon(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'cover_image' => 'image|nullable|max:1999',
        ]);
        if ($validator->fails()) {
            return redirect('/vartotojas')
                ->withErrors($validator)
                ->withInput();
        }
        
        //handle file upload 
        if($request->hasFile('user_image')){
            //get filename with the extension
            $filenameWithExt = $request->file('user_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('user_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image (send to public folder)
            $path = $request->file('user_image')->storeAs('public/user_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        $user = User::find($id);
        $user->user_image = $fileNameToStore;
        $user->save();
        return redirect('/vartotojas');
    }

    public function updateName(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return back()->withInput()
                        ->withErrors($validator);
        }
        $user = User::find($id);
        //tikrinimas
        if(auth()->user()->id !== $user->id){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        $user->name = $request->input('name');
        $user->save();
        return redirect(route('user.index'));
    }

    public function updateEmail(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        if ($validator->fails()) {
            return back()->withInput()
                        ->withErrors($validator);
        }
        $user = User::find($id);
        //tikrinimas
        if(auth()->user()->id !== $user->id){
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        $user->email = $request->input('email');
        $user->save();
        return redirect(route('user.index'));
    }
}
