@extends('layouts.app')

@section('content')

    @foreach($articles as $article)
        <div class="article-box">
            <h2>{{$article->title}}</h2>
            <p>{{$article->content}}</p>
            <div class="article-image">
                <img src="/storage/article_images/{{$article->article_image}}"  alt="">
            </div>
            <small>Sūkurta: {{$article->created_at}}</small>
        </div>
            @if(auth()->user()->name == "admin")
            <a href="/straipsniai/{{$article->id}}/edit" title="Redaguoti Straipsnį" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <form action={{ route('straipsniai.destroy', ['id' => $article->id]) }} method="POST" class="edit-and-delete">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" title="Trinti Temą" style="max-width: 80rem;" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></i></button>
            </form>
            @endif
    @endforeach





    {{-- Article Talpinimas --}}
    <br><br><br>
    @if(auth()->user()->name == "admin")
    <button class="btn btn-success" onclick="createArticle()">Pridėti</button>
    <div id="newArticle"><br>
        <form action={{route('straipsniai.store')}} method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="text">Pavadinimas</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="content">Turinys</label>
                <textarea class="form-control" id="content" name="content" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="file">Pridėti nuotrauką</label>
                <input type="file" class="form-control" id="article_image" name="article_image">
            </div>

            <button type="submit" class="btn btn-default">Patvirtinti</button>
        </form>
    </div>
    @endif
     


@endsection

@section('js')
    <script>

    function createArticle() {
        var element = document.getElementById("newArticle");
        element.classList.toggle("newArticleStyle");
    }

    </script>
@endsection