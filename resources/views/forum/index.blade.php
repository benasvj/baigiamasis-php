@extends('layouts.forumfront')

@section('sidebar')
    @php
        //kintamieji
        $lastone=null;
        $showlast=1;
    @endphp
    <br><h2>Kategorija</h2>
    <hr>
    <ul class="list-group">
        <a href={{route('forum.index')}} class="list-group-item d-flex justify-content-between align-items-center">
            Visos Temos
            <span class="badge badge-primary">{{\App\Post::all()->count()}}</span>
        </a>
        @forelse(\App\Category::all() as $category)

        <a href={{route('forum.index', ['cat' => $category->id])}} class="list-group-item d-flex justify-content-between align-items-center">
            {{$category->name}}
            <span class="badge badge-primary">{{$category->posts_cat->count()}}</span>
        </a>

        @empty
            <p>Kategorijų nėra</p>
        @endforelse

    </ul>
    <br>
    @if(auth()->user()->name == "admin")
        <a href="{{route('forumcats.create')}}" class="btn btn-primary">Prideti Kategoriją</a>
    @endif
@endsection

@section('content')
@include('inc.messages')
    <div class="col-md-8" style="max-width: 80rem;">
        <br><h2 align="center">Forumas</h2><hr>
        <div class="row">
            <a href="{{route('forum.create')}}" class="btn btn-primary">Kurti Temą</a>
        </div><br>
        @include('inc.post-list')
    </div>
@endsection