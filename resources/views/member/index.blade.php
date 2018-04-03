@extends('layouts.app')

@section('title', 'Mano Profilis')

@section('content')
    @include('inc.messages')
    <div class="card-profile">
        <h3 class="card-header">Mano Profilis</h3>
        <div class="card-body">
            <h6 class="card-subtitle text-muted">Profilio Ikona</h6>
        </div>
        <div class="img-container">
            <img style="height: 200px; width: 100%; display: block;" src="/storage/photo.jpg" alt="Card image">
            <a href="" title="Redaguoti"><i class="fas fa-pencil-alt"></i></a>
        </div>
        <br>
        <ul class="list-group list-group-flush bg-dark mb-3">
            <li class="list-group-item">Vardas <p>{{$userInfo->name}}</p><a href="" title="Redaguoti"><i class="fas fa-pencil-alt"></i></a></li>
            <li class="list-group-item">El. paštas <p>{{$userInfo->email}}</p><a href="" title="Redaguoti"><i class="fas fa-pencil-alt"></i></a></li>
            <li class="list-group-item"><a href="">Keisti Slaptažodį</a></li>
        </ul>
    </div>

@endsection