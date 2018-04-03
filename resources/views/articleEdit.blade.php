@extends('layouts.app')

@section('content')

<form action={{route('straipsniai.update', ['id'=>$article->id])}} method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="text">Pavadinimas</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$article->title}}">
    </div>
    <div class="form-group">
        <label for="content">Turinys</label>
        <textarea class="form-control" id="content" name="content" rows="5">{{$article->content}}"</textarea>
    </div>
    <div class="form-group">
        <label for="file">Pridėti nuotrauką</label>
        <input type="file" class="form-control" id="article_image" name="article_image">
    </div>
    <input type="hidden" name="_method" value="PUT">
    <button type="submit" class="btn btn-default">Patvirtinti</button>
</form>

@endsection