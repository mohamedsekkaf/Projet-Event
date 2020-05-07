<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Comment;
use Auth;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class CommentController extends Controller
{
    public function AddComment(Request $request){
        $request->validate([
            "comment"=>"required|max:1000",
        ]);
        $user = Auth::user()->name;
        $comment = $request->input('comment');
        $user_image = $request->input('user_image');
        $slug = $request->input('slug');
        $data = array('comment'=>$comment,'slug'=>$slug,'user'=>$user,'user_image'=>$user_image);
        Comment::create($data);
        return redirect('/ShowPost/'.$slug);
    }
    public function password(){
        $users = User::all();
        foreach($users as $user){
         /*    dd(Crypt::encrypt($user->password)); */
            $user->setAttribute('pass',bcrypt($user->password)); 
        }
        return view('pass',compact('users'));
    }
    public function Authuser()
    {
        $var = Auth::user()->name;
        return 2345678;
    }
    
}
