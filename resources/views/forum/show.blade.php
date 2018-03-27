@extends('layouts.front')

@section('content')
    <div class="col-md-4 col-sm-4">
        <h2>{{$post->title}}</h2>
        <img src="/storage/photo.jpg" alt="post img" style="width:100%">
    </div>
    <div class="col-md-8 col-sm-8">
        {{$post->content}}
        <br><small>Writen on {{$post->created_at}} by {{$post->user->name}}</small>
        @if (Auth::check())
            @if(Auth::user()->id == $post->user_id)
            <a href="/forum/{{$post->id}}/edit" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <form action={{ route('forum.destroy', ['id' => $post->id]) }} method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></i></button>
            </form>
            @endif
        @else
            <p></p>
        @endif
    </div>
    <hr>


@endsection
