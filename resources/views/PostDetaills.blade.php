@extends('layout')
@section("content")
<br><br><br>
<div class="container">
    @foreach($pd as $post)
    <div class="col-12">
        <div class="card">
            <br>
            <div class="container">
            <h4 class="card-title center"><strong><i>{{$post->title}}</i></strong></h4>
            </div>
            <div class="container">

                <table>
                    <tr>
                        <td><a href="{{url('/profile')}}/{{$post->user_name}}"><img class="card-img-top img-use"
                                    src="{{url('/image_user')}}/{{$post->img_user}}" alt="{{$post->user_name}}"></a>
                        </td>
                        <td style="width:160vh"><strong class="card-text"><b>{{$post->name}}</b></strong>
                        </td>
                        <td style="width:140vh;text-align:center;">{{$post->time}}</td>
                        <td class="td-setting">
                            <form action="{{ url('/DeletePost')}}" id="formimage" method="POST"
                                enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                            
                                <div class="btn-group " role="group" aria-label="">
                                    <div class="btn-group" role="group">
                                        <input type="image" style="width:8vh;height:6vh;"
                                            src="{{asset('/image/setting.png')}}"
                                            class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <ul style="" class="dropdown-menu">
                                            @if(Auth::user()->name == $post->user_name)
                                            <li style="text-align:center;"><input class="btn-delete" type="submit"
                                                    value="Delete"></li>
                                            <li style="text-align:center;"><a class="btn-update" href="#"
                                                    onclick="Showupdate_post()">Modify</a></li>
                                            @endif
                                            <li style="text-align:center;"><a class="btn-detaills"
                                                    href="{{url('/ShowPost')}}/{{$post->slug}}">Detaills</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <input type="hidden" name="slug" value="{{$post->slug}}" id="">
                                <!-- <input type="image" type="submit" src="{{asset('/image/delete.png')}}"
                                            style="width:5vh;height:5vh"> -->
                            </form>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="container" id="update_post">
                <div class="container">
                    <div>
                        <form action="{{ url('/UpdateTitlePost')}}" id="formimage" method="POST"
                            enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <input type="hidden" name="slug" value="{{$post->slug}}">
                            <label for="">Change Title</label>
                            <input type="text" value="{{$post->title}}" name="title" id="update_title"
                                class="form-control">
                            <input type="submit" value="Save">
                        </form>
                    </div>
                    <div>
                        <form action="{{ url('/UpdateDescriptionPost')}}" id="formimage" method="POST"
                            enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <input type="hidden" name="slug" value="{{$post->slug}}">
                            <label for="">Change Description</label>
                            <textarea type="text" name="description" id="update_title"
                                class="form-control">{{$post->disc}}</textarea>
                            <input type="submit" value="Save">
                        </form>
                    </div>
                    <div>
                        <form action="{{ url('/UpdateCategoryPost')}}" id="formimage" method="POST"
                            enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <input type="hidden" name="slug" value="{{$post->slug}}">
                            <label for="">Change Category</label>
                            <select name="category" id="update_title" class="form-control">
                                <option value="Category 1">Category 1</option>
                                <option value="Category 2">Category 2</option>
                                <option value="Category 3">Category 3</option>
                            </select>
                            <input type="submit" value="Save">
                        </form>
                    </div>
                    <div>
                        <form action="{{ url('/UpdateImagePost')}}" id="formimage" method="POST"
                            enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <input type="hidden" name="image_post" value="{{$post->image_post}}">
                            <input type="hidden" name="slug" value="{{$post->slug}}">
                            <label for="">Change Image</label>
                            <input type="file" name="image" id="update_title" class="form-control">
                            <input type="submit" value="Save">
                        </form>
                    </div>
                    <div>
                        <input onclick="Hideupdate_post()" type="submit" value="Hide">
                    </div>
                </div>
            </div>
            <div class="img container">

                <table>
                    <tr>
                        <td style="width:40vh"></td>
                        <td style="width:100%;"><img class="img-post"
                                src="{{asset('/image_post')}}/{{$post->image_post}}" alt="{{$post->title}}">
                        </td>
                        <td style="width:40vh"></td>
                    </tr>
                </table>
            </div>
            <div class="container">
                <table>
                    <tr>
                        <form action="{{ url('/AddFollow')}}" id="formimage" method="POST"
                            enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <input type="hidden" name="slug" value="{{$post->slug}}">
                            <input type="hidden" name="nombre_follow" src="{{asset('/image/like1.png')}}" id=""
                                value="{{$post->follow}}">
                            <td style="width:10vh;text-align:center"><input type="image" id="img"
                                    src="{{asset('/image/like.png')}}" style="width:5vh;height:5vh;border-radius: 10px;" alt="Submit">
                            </td>
                            <td>
                                <div class="btn-group " role="group" aria-label="">
                                    <div class="btn-group" role="group">
                                        <botton style="width:8vh;height:6vh;" class="btn btn-default dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php
                                                            $var = 0;
                                                            $userslug = Auth::user()->name.''.$post->slug;
                                                            foreach($foll as $f){
                                                                if($post->slug == $f->slug_follow){
                                                                $var++;
                                                                }
                                                            }
                                                            if($var >= 1000000){
                                                                $v = $var/1000000 ;
                                                                $v1 = $v.'M';
                                                            }
                                                            elseif($var >= 1000000000){
                                                                $v= $var/1000000000;
                                                                $v1= $v.'ML';
                                                            }
                                                            elseif($var >= 1000){
                                                                $v= $var/1000;
                                                                $v1= $v.'K';
                                                            }
                                                            else{
                                                                $v1= $var;
                                                            }
                                                            echo '<strong>'.$v1.' Like</strong>' ;
                                                            ?>
                                        </botton>
                                        <ul style="text-align:center;margin-top: -8px;    margin-left: 18px;"
                                            class="dropdown-menu">
                                            <?php
                                                            $follow = 0;
                                                            foreach($foll as $f){
                                                                if($post->slug == $f->slug_follow){
                                                                    $follow++;
                                                                }
                                                            } 
                                                            if($follow > 10){
                                                                $var=0;
                                                                foreach($foll as $ff){
                                                                    if($post->slug == $ff->slug_follow){
                                                                        if($var == 10){
                                                                        break;
                                                                        }
                                                                        else{    
                                                                            ?>
                                            <li><a
                                                    href="{{url('/profile')}}/<?php echo $ff->user_follow?>"><?php echo $ff->user_follow; ?></a>
                                            </li>
                                            <?php
                                                                        
                                                                        }
                                                                    }
                                                                    $var++;
                                                                }
                                                                $somm =$follow -10;
                                                                echo '<li>And '.$somm.' Auther</li>';
                                                            }else{
                                                                foreach($foll as $ff){
                                                                    if($post->slug == $ff->slug_follow){
                                                                    ?>
                                            <li><a
                                                    href="{{url('/profile')}}/<?php echo $ff->user_follow?>"><?php echo $ff->user_follow; ?></a>
                                            </li>
                                            <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                        </ul>
                                    </div>
                                </div>

                            </td>
                            <td style="width:200vh;text-align:right;">
                                <strong>{{$post->category_name}}</strong></td>
                        </form>
                    </tr>
                </table>
            </div>
            <br>
            <div class="container">
                <h3 style="text-align:center;">Description</h3>
                <p style="text-align:center;"><strong style="text-align:center;">{{$post->disc}}</strong></p>
            </div>
            <div class="container">
                <form action="{{ url('/AddComment')}}" id="formimage" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div>
                        <table>
                            <tr>
                                <td style="width:6vh;"><img class="img-use"
                                        src="{{asset('/image_user')}}/{{Auth::user()->name}}.png" alt=""></td>
                                <td style="width:150vh;text-align:center"><textarea id="comment" name="comment"
                                        placeholder="Add Comment"></textarea></td>
                                <td><input id="btnsend" type="image" src="{{asset('/image/send.png')}}" border="0"
                                        alt="Submit" /> </td>
                            </tr>
                        </table>
                        @guest
                        @else
                        <input type="hidden" value="{{$post->slug}}" name="slug" id="slug">
                        <input type="hidden" value="{{Auth::user()->image}}" name="user_image" id="user_image">
                        @endguest
                    </div>
                    <div class="col-12">
                        @foreach($errors->all() as $err)
                        <div class="alert alert-danger mt-5">
                            {{$err}}
                        </div>
                        @endforeach
                    </div>
                </form>
                <br><br>
            </div>
            <div class="container">
                <table>
                    @foreach($comments as $c)
                    <tr>
                        <td style="width:10vh;text-align:center"><img class="card-img-top img-use"
                                src="{{url('/image_user')}}/{{$c->user_image}}" alt="">{{$c->user}}</td>
                        <td style="width:140vh;text-align:center">
                            <?php 
                                    $v = 0;
                                    $v1 = $c->comment;
                                        for($i = 0 ; $i < strlen($v1) ; $i++){
                                            if($v1[$i]==" "){
                                                $v++;
                                                if($v == 10){
                                                    echo '<br>';
                                                    $v = 0;
                                                }
                                            }
                                            echo $v1[$i];
                                        }
                                ?>
                        </td>
                        <td style="width:;text-align:right;width:40vh">
                        <?php
                        echo $c->time;
                        /* $var = $c->time;
                        $compte= 0;
                        $string[2]="";
                        for( $i=0 ; $i<strlen($var);$i++){
                            if(is_numeric($var[$i])){
                             echo $var[$i]; 
                            }
                            if($var[$i] == " "){
                                $compte++;
                            }
                            if($compte == 1){
                                $string[0] =$var[$i];
                            }elseif($compte==2){
                                $string[1] =$var[$i];
                            }
                        } echo  '  '.strtoupper($string[0]).' '.strtoupper($string[1]); */
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <hr>
                        </td>
                        <td>
                            <hr>
                        </td>
                        <td>
                            <hr>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @foreach($foll as $f)
    @if($f->slug_plus_user == Auth::user()->name.$post->slug)
    <script>
    /* $(follow).addClass("err"); */
    var elem = document.getElementById("img");
    elem.setAttribute("src", "{{asset('/image/like1.png')}}");
    </script>
    @break
    @else
    <script>
    var elem = document.getElementById("img");
    elem.setAttribute("src", "{{asset('/image/like.png')}}");
    </script>
    @endif
    @endforeach
    @endforeach
    <div> 
        @endsection("content")