@extends('layout')
@section("content")
<div>
    <div class="container">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
            <div class="col-12">
                <div class="card">
                    <br>
                    <a href="{{url('/ShowPost')}}/{{$post->slug}}">
                        <h4 class="card-title center">{{$post->title}}</h4>
                    </a>
                    <div class="container">
                        <table>
                            <tr>
                                <td><img class="card-img-top img-use" src="{{url('/image_user')}}/{{$post->img_user}}"
                                        alt="{{$post->user_name}}"></td>
                                <?php $var = strtoupper($post->user_name);
                                echo '<td><span class="card-text"><b>'.$var.'</b></span></td>';?>
                                <td style="text-align:right;width:100vh;"> <span style="color:red;"
                                        class="card-text">{{$post->time}}</span></td>
                                
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
                                                <ul class="dropdown-menu" s>
                                                @if(Auth::user()->name == $post->user_name)
                                                    <!-- <li style="text-align:center;"><input class="btn-delete" type="submit" value="Delete"></li>
                                                    <li style="text-align:center;"><a class="btn-update" href="#" onclick="Showupdate_post()" >Update</a></li> -->
                                                    @endif
                                                    <li style="text-align:center;"><a class="btn-detaills" href="{{url('/ShowPost')}}/{{$post->slug}}">Detaills</a></li>
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
                                <td style="width:100%"><a href="{{url('/ShowPost')}}/{{$post->slug}}"><img
                                            class="img-post" src="{{asset('/image_post')}}/{{$post->image_post}}"
                                            alt="{{$post->title}}"></a></td>
                                <td style="width:5vh"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="container">
                        <div class="container">
                            <table>
                                <tr>
                                    <form action="{{ url('/AddFollowHome')}}" id="formimage" method="POST"
                                        enctype="multipart/form-data">
                                        @method('POST')
                                        @csrf
                                        <input type="hidden" name="slug" value="{{$post->slug}}">
                                        <td style="width:10vh;text-align:center"><input class="imgfollow" type="image"
                                                id="{{$post->slug}}" src="{{asset('/image/like.png')}}"
                                                style="width:5vh;height:5vh;" alt="Submit">
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
                                    echo '<td style="width:100vh"><label for=""><strong>'.$v1.' Like </strong></label></td>';
                                    ?>
                                    <td style="width:80vh;text-align:right;margin-top:-3px;"><strong>{{$post->category_name}}</strong></td>
                                    </form>
                                </tr>
                            </table>
                        </div>
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
            </div>
            @endforeach
        </div>
    </div>
</div>
<button id="ref_butn">Refresh the page!</button>










<span class="glyphicon glyphicon-hand-right"></span>
@endsection("content")