@extends('layout')
@section('content')
@foreach($profileuser as $profile)
<br><br><br>
<div class="container">
    <div class="card">
        <br>
        @if($profile->name == Auth::user()->name)
        <div class="container div-image-user">
            <img class="image-user" src="{{asset('/image_user')}}/{{$profile->image}}" alt="">
            <img id="icon-edit-user-image" class="Image-Edit-user" src="{{asset('/image/edit1.png')}}" type="button"
                onclick="ShowDIVEditImage()" data-fleep="tooltip" data-placement="bottom"
                data-original-title="Clicker Pour Changer Image" data-toggle="modal">

            <div class="showme" id="div-edit">
                <form action="{{ url('/EditImageUser')}}" id="formimage" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <input type="file" name="file" id="file" class="inputfile" required />
                    <label class="edit-label" for="file" id="r" style=""><img style="width:10vh;height:5vh;" src="{{asset('image/upload.png')}}" alt=""></label>
                    <br>
                    <label id="error-edit-image-user"></label>
                    <input id="btn-save" class="btn-save btnEdit" onclick="btnsave()" type="submit" value="save">
                </form>
            </div>
        </div>
        <br><br><br>
        <div class="container">
            <form action="{{ url('/EditUser')}}" id="frm" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="container">
                    <label for=""> Change Name</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{$profile->name}}" required>
                    <input type="submit" class="btnEdit" value="Save">
                </div>
            </form>
            <br>
            <form action="{{ url('/EditUserEmail')}}" id="frm" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="container">
                    <label>Change Email </label>
                    <input id="email" name="email" type="text" class="form-control" value="{{$profile->email}}"
                        required>
                    <input id="id-btn-save" type="submit" class="btnEdit"  value="Save">
                </div>
            </form>
        </div>
        <br>
        <div class="container">
            <form action="{{ url('/EditUserPass')}}" id="" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="container">
                    <label>change Password</label>
                    <input type="password" name="pasword" id="pass" class="form-control">
                    <input type="checkbox" onclick="showpassword()">Show Password<br>
                    <input type="submit" class="btnEdit" value="Save">
                </div>
                <div class="col-12">
                    @foreach($errors->all() as $err)
                    <div class="alert alert-danger mt-5">
                        {{$err}}
                    </div>
                    @endforeach
                </div>
            </form>
        </div>
        @else
        <div class="container div-image-user">
            <img class="image-user" src="{{asset('/image_user')}}/{{$profile->image}}" alt="">
        </div>
        <div class="container">
            <div class="container">
                <h5 style="text-align:center"><strong style="text-align:center">{{$profile->name}}</strong></h5>
            </div>
        </div>
        @endif
        <div class="container">
            @foreach($posts as $post)
            @if($profile->name == $post->user_name)
            <div class="col-12">
                <br>
                <a href="{{url('/ShowPost')}}/{{$post->slug}}">
                    <h4 class="card-title center">{{$post->title}}</h4>
                </a>
                <div class="container">
                    <table>
                        <tr>
                            <td><img class="card-img-top img-use" src="{{url('/image_user')}}/{{$post->img_user}}"
                                    alt="{{$post->user_name}}">
                            </td>
                            <td style="width:160vh"><span class="card-text"><b>{{$post->name}}</b></span></td>
                            <td style="text-align:center;width:100vh;"><span class="card-text">{{$post->time}}</span></td>

                            <td class="td-setting">
                                <form action="{{ url('/DeletePost')}}" id="formimage" method="POST"
                                    enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="btn-group " role="group" aria-label="">
                                        <div class="btn-group" role="group">
                                            <input type="image" style="width:8vh;height:6vh;"
                                                src="{{asset('/image/setting1.png')}}"
                                                class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            <ul class="dropdown-menu" s>
                                                @if(Auth::user()->name == $post->user_name)
                                                <!-- <li style="text-align:center;"><input class="btn-delete" type="submit" value="Delete"></li>
                                                    <li style="text-align:center;"><a class="btn-update" href="#" onclick="Showupdate_post()" >Update</a></li> -->
                                                @endif
                                                <li style="text-align:center;"><a class="btn-detaills"
                                                        href="{{url('/ShowPost')}}/{{$post->slug}}">Detaills</a></li>
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
                <div class="img container">
                    <table>
                        <tr>
                            <td style="width:5vh"></td>
                            <td style="width:100%"><a href="{{url('/ShowPost')}}/{{$post->slug}}"><img class="img-post"
                                        src="{{asset('/image_post')}}/{{$post->image_post}}" alt="{{$post->title}}"></a>
                            </td>
                            <td style="width:5vh"></td>
                        </tr>
                    </table>
                </div>
                <div class="container">
                        <table>
                            <tr>
                                <form action="{{ url('/AddFollowProfile')}}" id="formimage" method="POST"
                                    enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <input type="hidden" name="user_profile" value="{{ $profile->name }}">
                                    <input type="hidden" name="slug" value="{{$post->slug}}">
                                    <td style="width:10vh;text-align:center"><input class="imgfollow" type="image"
                                            id="{{$post->slug}}" src="{{asset('/image/like.png')}}"
                                            style="width:5vh;height:5vh;" alt="Submit">
                                    </td>
                                    <td>
                                        <div class="btn-group " role="group" aria-label="">
                                            <div class="btn-group" role="group">
                                                <botton style="width:8vh;height:6vh;"
                                                    class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
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
                                    <td style="width:200vh;text-align:right;margin-top:-3px;">
                                        <strong>{{$post->category_name}}</strong></td>
                                </form>
                            </tr>
                        </table>
                </div>
                @foreach($foll as $f)
                @if($f->slug_plus_user == Auth::user()->name.$post->slug)
                <script>
                /* $(follow).addClass("err"); */
                var elem = document.getElementById("{{$post->slug}}");
                elem.setAttribute("src", "{{asset('/image/like1.png')}}");
                </script>
                @break
                @else
                <script>
                var elem = document.getElementById("{{$post->slug}}");
                elem.setAttribute("src", "{{asset('/image/like.png')}}");
                </script>
                @endif
                @endforeach
                <div class="container">
                    <h6 style="text-align:center">Description</h6>
                    <p style="text-align:center"> <strong>{{$post->disc}}</strong></p>
                </div>
                <div class="container">
                    <a class="link-comment" href="{{url('/ShowPost')}}/{{$post->slug}}">
                        <p style="text-align:center;"><strong>Afficher Les commentaire</strong></p>
                    </a>
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </div>
</div>
</div>
<?php

?>
@endforeach
@endsection('content')