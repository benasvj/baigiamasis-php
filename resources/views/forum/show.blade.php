@extends('layouts.app')

@section('content')
    @include('inc.onepost')
    
    <br>
    {{--  Naujo Komentaro Kurimas  --}}
    <div class="jumbotron"  style="max-width: 80rem;" aria-label="Third group">
        <button class="btn btn-success" onclick="comment()">Komentuoti</button>
        <div id="newComment">
        <form action={{route('postcomment.store', ['id' => $post->id])}} method="post">
            @csrf
            <br>
            <h3>Komentaras</h3>

            <div class="form-group">
                <textarea class="form-control" id="article-ckeditor" name="body" rows="7"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Go!</button>
        </form>
        </div>
    </div>
    @include('inc.commentsandreplies')
@endsection

@section('js')

    <script>
        //reply suskleidimas
 
        function toggleReply(commentId){
            $('.btn-default-'+commentId).css("display", "none");
            $('.reply-form-'+commentId).css("display", "block");
        };

        function atgal(commentId){
            $('.btn-default-'+commentId).css("display", "block");
            $('.reply-form-'+commentId).css("display", "none");
        };

        function comment() {
            var element = document.getElementById("newComment");
            element.classList.toggle("showCommentForm");
        }
    </script>
@endsection