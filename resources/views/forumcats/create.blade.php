@extends('layouts.app')

@section('title', 'Kategorijos Kūrimas')

@section('content')
    @include('inc.messages')
    <form action={{ route('forumcats.store') }} method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Pavadinimas</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="position">Nurodyti Poziciją</label>
            <input type="number" class="form-control" id="position" name="position">
        </div>
        <button type="submit" class="btn btn-success">Sukurti</button>
    </form>
@endsection