<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\langage;
class LangageController extends Controller
{
    public function ShowLang(Request $request){
        $like = 'Like';
        $like1 = 'اعجاب';
        $like2 = 'j aime';
        
        if($request->input('lang')=='an'){
            return view('/home',compact('like'));
        }
        else {
            return view('/home');
        }
    }
}
