<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
class CommentController extends Controller
{
    public function AddComment(Request $request){
        $request->validate([
            "comment"=>"required",
        ]);
        $user = Auth::user()->name;
        $comment = $request->input('comment');
        $user_image = $request->input('user_image');
        $slug = $request->input('slug');
        $data = array('comment'=>$comment,'slug'=>$slug,'user'=>$user,'user_image'=>$user_image,'date'=>date('yy-m-d').' '.date('H:s:i'));
        DB::table('comments')->insert($data);
        return redirect('/ShowPost/'.$slug);
    }
}
