@extends('layouts.app')

@section('content')
    @include('inc.onepost')
    
    @include('inc.commentsandreplies')

    <br>

    {{--  Naujo Komentaro Kurimas  --}}
    <div class="jumbotron"  style="max-width: 80rem;" aria-label="Third group">
        <form action={{route('postcomment.store', ['id' => $post->id])}} method="post">
            @csrf
            <h3>Rašyti Komentarą</h3>

            <div class="form-group">
                <textarea class="form-control" id="article-ckeditor" name="body" rows="7"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Komentuoti</button>
        </form>
    </div>
@endsection

@section('js')

    <script>
        //reply suskleidimas
        function toggleReply(commentId){
            $('.reply-form-'+commentId).css("display", "");
            $('.reply-form-'+commentId).toggleClass(`.reply-form-${commentId}`);
        };

        //Del Like ir Dislike pridėjimo
        var token = '{{Session::token()}}';
        var urlLike = '{{route('likeIt')}}';

        $('.like').click(function(event){
            event.preventDefault();
            commentId = event.target.parentNode.parentNode.parentNode.dataset['commentid'];
            var isLike = event.target.previousElementSibling == null? true : false;
            console.log(commentId);
            $.ajax({
                method: 'POST',
                url: urlLike,
                data: {isLike: isLike, commentId: commentId, _token: token}
            })
                .done(function(){
                    console.log('ok');
                });
        });
    </script>
@endsection