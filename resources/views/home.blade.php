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
                                <td style="text-align:right;width:20vh;color:red;"> <span style="color:red;"
                                        class="card-text">{{$post->time}}</span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="img container">
                        <table>
                            <tr>
                                <td style="width:5vh"></td>
                                <td style="width:100%"><img class="img-post" src="{{asset('/image_post')}}/{{$post->image_post}}"
                                        alt="{{$post->title}}"></td>
                                <td style="width:5vh"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="container">
                        <h6 style="text-align:center">Description</h6>
                       <p style="text-align:center"> <strong>{{$post->disc}}</strong></p>
                       
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection("content")