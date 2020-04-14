@extends('layout')
@section("content")
<div>
    <div class="container">
        <div class="row">
        @foreach($posts as $post)
            <div class="col-12">
                <div class="card">
                    <img class="card-img-top" src="holder.js/100x180/" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{$post->title}}</h4>
                        <p class="card-text">Text</p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection("content")