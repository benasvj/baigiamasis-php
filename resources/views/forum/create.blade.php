@extends('layouts.front')

@section('title', 'Forumas')

@section('content')
    @include('inc.messages')
    <form action={{ route('forum.store') }} method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Temos Pavadinimas</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <select class="form-control" id="category" name="category">
            @foreach($categories as $category)
                <option value={{$category->id}}>{{$category->name}}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="content">Turinys</label>
            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Sukurti Temą</button>
    </form>
@endsection