@extends('layout')
@section("content")
<br><br>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ url('/AjouterPost') }}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="container">
                    <div class="card">
                        <br>
                        <label class="label-din" for="">Title</label>
                        <input id="title" type="text" name="title" class="form-control" placeholder="title">
                        <br>
                        <label class="label-din" for="">Discription</label>
                        <textarea id="desc" name="disc" class="form-control" placeholder="Description"></textarea>
                        <br>
                        <label class="label-din" for="">Nom de l'Utilisateur</label>
                        <input id="user" type="text" value="{{ Auth::user()->name }}" name="user_name" class="form-control"
                            placeholder="user name">
                        <br>
                        <label class="label-din" for="">Categorie</label>
                        <select name="category_name" class="form-control" id="category">
                            <option id="category" value="Categorie 1">Categorie 1 </option>
                            <option id="category" value="Categorie 2">Categorie 2 </option>
                            <option id="category" value="Categorie 3">Categorie 3 </option>
                        </select>
                        <br>
                        <label  class="label-din">Post Image </label>
                        <input id="fileAddPost" type="file" name="image_post" class="form-control">
                        <div class="btn">
                            <input type="submit" class="btn-ajouter">
                        </div>
                    </div>

                </div>
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
@endsection("content")