<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Comment;
use App\Category;
use App\Follower;
use App\compte_Post;
use DB;
use Carbon\Carbon;
use Auth;
use Illuminate\Validation\Validator;
class PostController extends Controller
{
/**** function for view home and compact the variables to view home */
    public function index(){
        Carbon::setlocale('fr');
        $posts = Post::orderBy('id', 'desc')->get();
        $foll = Follower::all();
        foreach($posts as $post){
            $post->setAttribute('name', strtoupper($post->user_name));
            $post->setAttribute('time',Carbon::parse($post->created_at)->diffForHumans());
        }
        return view('home',compact('posts','foll'));
    }

/***** function for show Post after click on this post for show post detailles */
    public function ShowPost($slug){
        $comments= Comment::where('slug' , $slug)->get();
        foreach($comments as $comment){
            $comment->setAttribute('time',Carbon::parse($comment->created_at)->diffForHumans());
            echo '<script>console.log(1)</script>';
        }
        $pd = Post::where('slug',$slug)->get();
        foreach($pd as $post){
            $post->setAttribute('name', strtoupper($post->user_name));
            $post->setAttribute('time',Carbon::parse($post->created_at)->diffForHumans());
        } 
        /* $comment = DB::select("select * from comments where slug = ?",[$slug]); */
         /* $pd = DB::select("select * from posts where slug = ?",[$slug]); */ 
        $foll = Follower::all();
       return  view('PostDetaills',compact('pd','comments','foll'));
    }

/****** function for show view Ajouter post  */
    public function AjouterPostInfo(){
        return view('AjouterPost');
    }

/*****function for Ajouter post back end  */
    public function AjouterPost(Request $request){
        $request->validate([
            "title"  =>"required",
            "disc"  =>"required",
            "user_name"  =>"required",
            "category_name"  =>"required",
            "image_post"  =>"required|mimes:jpeg,bmp,png،jpg",
        ],
        [
            "title.required"  =>" Title Obligatoire",
            "disc.required"  =>"Discripion Obligayoire",
            "user_name.required"  =>"Utilisateur Obligatoire",
            "category_name.required"  =>"Categorie Obligatoire",
            "image_post.required"  =>"Image Obligatoire ",
        ]);
       
        $compte_post = compte_Post::all();
        foreach($compte_post as $compte){
          $compte_post = $compte->compte_post+1;
        }
        DB::table('compte__posts')
        ->update(array('compte_post'=>$compte_post));
        
        $title = $request->input('title');
        $disc = $request->input('disc');
        $user_name = $request->input('user_name');
        $category_name = $request->input('category_name');
        $image_post = $request->input('image_post');
       /*  $slug = generateRandomString(50); */
        if ($request->has('image_post')) {
            $files = $request->file('image_post');
          // Define upload path
           $destinationPath = public_path('/image_post/'); // upload path
         // Upload Orginal Image           
           $postImage =$compte_post. '.' .'png';
           $request->file('image_post')->move($destinationPath, $postImage);
        $data=array('title'=>$title,'disc'=>$disc,'slug'=>$compte_post,'user_name'=>$user_name,'category_name'=>$category_name,'image_post'=>$postImage,'img_user'=>Auth::user()->image,'follow'=>0);
        Post::create($data);
        return redirect('/home');
        }
    }

    public function profile($user){
        Carbon::setlocale('fr');
        $profileuser = DB::select('select * from users where name =?',[$user]) ;
        $posts = Post::orderBy('id', 'desc')->get();
        $foll = Follower::all();
        foreach($posts as $post){
            $post->setAttribute('name', strtoupper($post->user_name));
            $post->setAttribute('time',Carbon::parse($post->created_at)->diffForHumans());
        }
        return view('profile',compact('profileuser','posts','foll'));
    }

/**============================ update user name  */
    public function EditUser(Request $request){
        $request->validate([
            'name'  =>['required', 'unique:users', 'max:20'],
        ]
        );
        $name = $request->input('name');
        $user =Auth::user()->name;
        $follower = Follower::all();
        DB::table('users')
       ->where('name', $user)
       ->update(array('name' => $name));
       DB::table('posts')
       ->where('user_name', $user)
       ->update(array('user_name' => $name ));
       DB::table('comments')
       ->where('user',$user)
       ->update(array('user'=>$name));

       foreach($follower as $f){
           $number = [];
           $userslug=$f->slug_plus_user;
           for($i=0;$i<strlen($userslug);$i++){
               if(is_numeric($userslug[$i])){
                   array_push($number,$userslug[$i]);
               }
           }
           DB::table('followers')
           ->where('user_follow',$user)
           ->update(array('user_follow'=>$name,'slug_plus_user'=>$name.''.implode("",$number)));
       }
       return redirect('/profile/'.$name);
    }


    /******************** Update user Email */
    public function EditUserEmail(Request $request){
        $request->validate([
            "email"=>['required','unique:users','email'],
        ]);
        $email = $request->input('email');
        $user = Auth::user()->id;
        DB::table('users')
        ->where('id',$user)
        ->update(array('email'=>$email));
        $user_Auth=Auth::user()->name;
        return redirect('/profile/'.$user_Auth);
    }


/**=====================update user image  */
    public function EditImageUser(Request $request){
        $image = $request->input('file');
        $user =Auth::user()->name;
        if ($request->has('file')) {
            $files = $request->file('file');
          // Define upload path
           $destinationPath = public_path('/image_user/'); // upload path
         // Upload Orginal Image           
           $postImage =$user.'.'.'png'/* $files->getClientOriginalExtension() */;
           $request->file('file')->move($destinationPath, $postImage);
        DB::table('users')
        ->where('name', $user)
        ->update(array('image' => $postImage ));
        DB::table('posts')
        ->where('user_name', $user)
        ->update(array('img_user' => $postImage ));
        DB::table('comments')
        ->where('user',$user)
        ->update(array('user_image'=>$postImage));
        return redirect('/profile/'.$user);
        }
    }



    /******************** Update user Password */
    public function EditUserPass(Request $request){
        $request->validate([
            "pasword" =>"required|min:3|string",
        ]);
        $pasword = $request->input('pasword');
        $user = Auth::user()->name;
        DB::table('users')
        ->where('name',$user)
        ->update(array('password'=>hash::make($pasword)));
        return redirect('/profile/'.$user);
    }

  /********* Start Add Add  Like */
    public function AddFollow(Request $request){
        $nombre_follow =0;
        $slug = $request->input('slug');
        $user = Auth::user()->name;
         $foll = Follower::all();
         $var =0;
         foreach($foll as $f){
             if($f->slug_plus_user == $user.''.$slug){
                 $var++;
             }
             else{
                 $v =2;
             }
             $nombre_follow++;
         }
         if($var != 0){
            DB::table('followers')->where('slug_plus_user',$user.''.$slug)->delete();
         }
         else{
             $data = array('user_follow'=>$user,'follow'=>1,'slug_follow'=>$slug,'slug_plus_user'=>$user.''.$slug);
             Follower::create($data);
         }
        return redirect('/ShowPost/'.$slug );
    }
    /*********End  Add Add Like */

 /********* Start Add Add  Like */
 public function AddFollowHome(Request $request){
    $nombre_follow =0;
    $slug = $request->input('slug');
    $user = Auth::user()->name;
     $foll = Follower::all();
     $var =0;
     foreach($foll as $f){
         if($f->slug_plus_user == $user.''.$slug){
             $var++;
         }
         else{
             $v =2;
         }
         $nombre_follow++;
     }
     if($var != 0){
        DB::table('followers')->where('slug_plus_user',$user.''.$slug)->delete();
     }
     else{
         $data = array('user_follow'=>$user,'follow'=>1,'slug_follow'=>$slug,'slug_plus_user'=>$user.''.$slug);
         Follower::create($data);
     }
    return redirect('/home');
}
/*********End  Add Add Like */
 /********* Start Add Add  Like Profile */
 public function AddFollowProfile(Request $request){
    $nombre_follow =0;
    $slug = $request->input('slug');
    $user_profile = $request->input('user_profile');
    $user = Auth::user()->name;
     $foll = Follower::all();
     $var =0;
     foreach($foll as $f){
         if($f->slug_plus_user == $user.''.$slug){
             $var++;
         }
         else{
             $v =2;
         }
         $nombre_follow++;
     }
     if($var != 0){
        DB::table('followers')->where('slug_plus_user',$user.''.$slug)->delete();
        
     }
     else{
         $data = array('user_follow'=>$user,'follow'=>1,'slug_follow'=>$slug,'slug_plus_user'=>$user.''.$slug);
         Follower::create($data);
     }
    return redirect('/profile/'.$user_profile)->with('status', $slug);
}
/*********End  Add Add Like Profile*/


    /********* Start UpdateTitlePost */
    public function UpdateTitlePost(Request $request){
        $slug = $request->input('slug');
        $title = $request->input('title');
        DB::table('posts')->where('slug',$slug)->update(array('title'=>$title));
        return redirect('/ShowPost/'.$slug);
    }
    /********* End UpdateTitle  */
    /********* Start UpdateDescriptionPost */
    public function UpdateDescriptionPost(Request $request){
        $slug = $request->input('slug');
        $disc = $request->input('description');
        DB::table('posts')->where('slug',$slug)->update(array('disc'=>$disc));
        return redirect('/ShowPost/'.$slug);
    }
    /********* End UpdateDescriptionPost  */
    /********* Start UpdateCategoryPost */
    public function UpdateCategoryPost(Request $request){
        $slug = $request->input('slug');
        $category = $request->input('category');
        DB::table('posts')->where('slug',$slug)->update(array('category_name'=>$category));
        return redirect('/ShowPost/'.$slug);
    }
    /********* End UpdateCategoryPost  */
    /********* Start UpdateImagePost */
    public function UpdateImagePost(Request $request){
        $slug = $request->input('slug');
        $image_post = $request->input('image_post');
        if ($request->has('image')) {
                $files = $request->file('image');
            // Define upload path
            $destinationPath = public_path('/image_post/'); // upload path
            // Upload Orginal Image           
            $postImage =$image_post;
            $request->file('image')->move($destinationPath, $postImage);
            DB::table('posts')->where('slug',$slug)->update(array('image_post'=>$postImage));
            return redirect('/ShowPost/'.$slug);
        }
    }
    /********* End UpdateImagePost  */

    /***Delete Post  */
 public function DeletePost(Request $request){
    $slug = $request->input('slug');
    Post::where('slug',$slug)->delete();
    return redirect('/');
}
/** End Delete Post */

}
/******************fuction generate string different */

function generateRandomString($length) {
    $characters = 'DSFHFHFDJHfhfghfgdhreteRGESHSERTAEHDFGEJNTYUOKRYURUTYR1234567890FDEBHTYTNBEGBRSBV987654398765ERGEWRBRWTEBTBHRWEVTWEHRYWTBGTHBTV';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
/******************fuction generate string different */

/* FJhHYSS3SBSRT5EFhTB7FEETWWERG0SEHTh4fV9R9BBU3VGGTEHBYYGDB7OVeUBKERGTWRJGTHDVEVGDERHE8EFTTTBSWRB7YH8gE8ASW5TdO3NY8Ge5eUENEWTEEeHA5EJTT4WTTERSHWgS9DOgODYGFNTEH0T85fRSWRTR0ERFee8UTBHHRTRS8t26ETRVeDYNTBTR */
/* 33Y95BhDYTh1YOTVJRRGhtTTGYNSBHDH3K6HBHF3SOTtdYRGUER9KRRHTYHH35HRNY3WGRTDY2UE48FRSYhVKSE8OWRWETBW9GRKRH6VRGFDHETd5E4JEBERET9HEJRRB3GET3DFGFEA7W9HDERT27NTFWfE7e3R9BeE11RREBBSRWFWSYYHTD5FHTfTHF8NFh3JEh4VfF */