@extends('layouts.front')

@section('title', 'Koreguoti Įrašą')

@section('content')
    @include('inc.messages')
    <form action={{ route('forum.update', ['id' => $post->id]) }} method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Temos Pavadinimas</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label for="content">Turinys</label>
            <textarea class="form-control" id="content" name="content" rows="5">{{$post->content}}</textarea>
        </div>
        <input type="hidden" name="_method" value="PUT">
        <button type="submit" class="btn btn-success">Atnaujinti</button>
    </form>
@endsection