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
            <img style="height: 200px; width: 100%; display: block;" src="/storage/user_images/{{$userInfo->user_image}}" alt="image"><br>
            <button class="btn btn-success" onclick="iconChange()">Keisti</button>
            {{-- Foto keitimas --}}
            <div id="updateIcon"><br>
                <form action={{route('usericon', ['id'=>$userInfo->id])}} method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="file">Pridėti nuotrauką</label>
                        <input type="file" class="form-control" id="user_image" name="user_image">
                    </div>

                    <button type="submit" class="btn btn-default">Patvirtinti</button>
                </form>
            </div>
        </div>
        <br>
        <ul class="list-group list-group-flush bg-dark mb-3">
            <li class="list-group-item">
                Vardas <p>{{$userInfo->name}} </p><a href="#" title="Redaguoti" onclick="nameChange()"><i class="fas fa-pencil-alt"></i></a>
                {{-- Vardo keitimas --}}
                <div id="updateName"><br>
                    <form action={{route('username', ['id'=>$userInfo->id])}} method="post">
                        @csrf
    
                        <div class="form-group">
                            <label for="name">Įvesti naują vartotojo vardą</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
    
                        <button type="submit" class="btn btn-default">Patvirtinti</button>
                    </form>
                </div>
            </li>

            <li class="list-group-item">
                El. paštas <p>{{$userInfo->email}}</p><a href="#" title="Redaguoti" onclick="emailChange()"><i class="fas fa-pencil-alt"></i></a>
            {{-- Email Keitimas --}}
            <div id="updateEmail"><br>
                <form action={{route('useremail', ['id'=>$userInfo->id])}} method="post">
                    @csrf

                    <div class="form-group">
                        <label for="email">Įvesti naują el. paštą</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>

                    <button type="submit" class="btn btn-default">Patvirtinti</button>
                </form>
            </div>
            </li>
        </ul>
    </div>

@endsection

@section('js')
    <script>

    function iconChange() {
        var element = document.getElementById("updateIcon");
        element.classList.toggle("ikonosForma");
    }

    function nameChange() {
        var element = document.getElementById("updateName");
        element.classList.toggle("vardoForma");
    }

    function emailChange() {
        var element = document.getElementById("updateEmail");
        element.classList.toggle("emailoForma");
    }
    </script>
@endsection