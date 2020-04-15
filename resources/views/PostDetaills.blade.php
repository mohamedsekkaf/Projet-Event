@extends('layout')
@section("content")

<div class="container">
    <div class="row">
        @foreach($pd as $post)
        <div class="col-12">
            <div class="card">
                <br>
                <h4 class="card-title center">{{$post->title}}</h4>
                <div class="container">
                    <table>
                        <tr>
                            <td><img class="card-img-top img-use" src="{{url('/image_user')}}/{{$post->img_user}}"
                                    alt="{{$post->user_name}}"></td>
                            <?php $var = $post->user_name; for($i=0;$i<strlen($var);$i++){$var[$i] = strtoupper($var[$i]); ;} 
                                echo '<td><span class="card-text"><b>'.$var.'</b></span></td>';?>
                            <!--  -->
                        </tr>
                    </table>
                </div>
                <div class="img container">
                    <table>
                        <tr>
                            <td style="width:5vh"></td>
                            <td style="width:100%;"><img class="img-post"
                                    src="{{asset('/image_post')}}/{{$post->image_post}}" alt="{{$post->title}}"></td>
                            <td style="width:5vh"></td>
                        </tr>
                    </table>
                </div>
                <div class="container">
                    <div class="container">
                        <table>
                            <tr>
                                <form action="{{ url('/AddFollow')}}" id="formimage" method="POST"
                                    enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <input type="hidden" name="slug" value="{{$post->slug}}">
                                    <input type="hidden" name="nombre_follow" id="" value="{{$post->follow}}">
                                    <td style="width:10vh;text-align:center"><input type="image" id="img"  style="width:5vh;height:5vh;" alt="Submit">
                                    </td>
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
                                    echo '<td><label for=""><strong>'.$v1.' Like </strong></label></td>';
                                    ?>
                                </form>
                            </tr>
                        </table>
                    </div>
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
                </div>
                <div class="container">
                    <table>
                        @foreach($comment as $c)
                        <tr>
                            <td style="width:10vh;text-align:center"><img class="card-img-top img-use"
                                    src="{{url('/image_user')}}/{{$c->user_image}}" alt="">{{$c->user}}</td>
                            <td style="width:100vh;text-align:center">
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
                            <td style="width:;text-align:center">{{$c->date}}</td>
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


            <div id="placehere">
            </div>
            @endsection("content")