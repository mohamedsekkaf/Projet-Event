@extends('layout')
@section('content')
@foreach($profileuser as $profile)

<div class="container">
    <div class="card">
        <br>
        <div class="container div-image-user">
            <img class="image-user" src="{{asset('/image_user')}}/{{$profile->image}}" alt="">

            <img id="icon-edit-user-image" class="Image-Edit-user" src="{{asset('/image/edit1.png')}}" type="button"
                onclick="ShowDIVEditImage()" data-fleep="tooltip" data-placement="bottom"
                data-original-title="Clicker Pour Changer Image" data-toggle="modal">
            <div class="middle">
                <div class="text">John Doe</div>
            </div>
            <div class="showme" id="div-edit">
                <form action="{{ url('/EditImageUser')}}" id="formimage" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <input type="file" name="file" id="file" class="inputfile" required />
                    <label class="edit-label" for="file" id="r" style="" data-fleep="tooltip" data-placement="bottom"
                        data-original-title="Clicker Pour Selectionner Image" data-toggle="modal">Updoad</label>
                    <br>
                    <label id="error-edit-image-user"></label>
                    <input id="btn-save" class="btn-save" onclick="btnsave()" type="submit" value="save">
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
                    <input type="submit" value="Save">
                </div>
            </form>
            <form action="{{ url('/EditUserEmail')}}" id="frm" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="container">
                    <label>Change Email </label>
                    <input id="email" name="email" type="text" class="form-control" value="{{$profile->email}}"
                        required>
                    <input id="id-btn-save" type="submit" value="Save">
                </div>
            </form>
        </div>
        <div class="container">
            <form action="{{ url('/EditUserPass')}}" id="" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="container">
                    <label>change Password</label>
                    <input type="password" name="pasword" id="pass" class="form-control">
                    <input type="checkbox" onclick="showpassword()">Show Password<br>
                    <input type="submit" value="Save">
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
    </div>
</div>
</div>
<?php

?>
@endforeach

@endsection('content')