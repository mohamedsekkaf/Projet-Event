<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Comment;
use App\Category;
use DB;
use Carbon\Carbon;
use Auth;
use Illuminate\Validation\Validator;
class PostController extends Controller
{
    public function index(){
        Carbon::setlocale('fr');
        $posts = Post::orderBy('id', 'desc')->get();
        foreach($posts as $post){
            $post->setAttribute('time',Carbon::parse($post->created_at)->diffForHumans());
        }
        return view('home',compact('posts'));
    }
    public function ShowPost($slug){
        $comment = DB::select("select * from comments where slug = ?",[$slug]);
        $pd = DB::select("select * from posts where slug = ?",[$slug]);
       return  view('PostDetaills',compact('pd','comment'));
    }
    public function AjouterPostInfo(){
        return view('AjouterPost');
    }
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
        ]
        );
        $title = $request->input('title');
        $disc = $request->input('disc');
        $user_name = $request->input('user_name');
        $category_name = $request->input('category_name');
        $image_post = $request->input('image_post');

        if ($request->has('image_post')) {
            $files = $request->file('image_post');
          // Define upload path
           $destinationPath = public_path('/image_post/'); // upload path
         // Upload Orginal Image           
           $postImage =generateRandomString(100). '.' . $files->getClientOriginalExtension();
           $request->file('image_post')->move($destinationPath, $postImage);
        $data=array('title'=>$title,'disc'=>$disc,'slug'=>date('H:s:i').date('H:s:i').generateRandomString(200),'user_name'=>$user_name,'category_name'=>$category_name,'created_at'=>date('yy-m-d').' '.date('H:i:s'),'updated_at'=>date('yy-m-d').' '.date('H:i:s'),'image_post'=>$postImage,'img_user'=>Auth::user()->image);
        DB::table('posts')->insert($data);
        return redirect('/');
        }
    }
    public function profile($user){
        $profileuser = DB::select('select * from users where name =?',[$user]) ;
        return view('profile',compact('profileuser'));
    }
/**============================ update user name and user email  */
    public function EditUser(Request $request){
        $request->validate([
            'name'  =>['required', 'unique:users', 'max:20'],
        ]
        );
        $name = $request->input('name');
        $user =Auth::user()->id;
        DB::table('users')
       ->where('id', $user)
       ->update(array('name' => $name,'email'=>$email ));
       DB::table('posts')
       ->where('user_name', $user)
       ->update(array('user_name' => $name ));
       
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
           $postImage =$user.'.'.$files->getClientOriginalExtension();
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
        $user = Auth::user()->id;
        DB::table('users')
        ->where('id',$user)
        ->update(array('password'=>hash::make($pasword)));
        return redirect('/profile/'.$user);
    }

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