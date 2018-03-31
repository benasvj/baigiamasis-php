@extends('layouts.app')

@section('content')
    <div class="card text-white bg-dark mb-3" style="max-width: 80rem;">
        <div class="card-header">{{$post->title}}</div>
        <div class="card-body">
            <h4 class="card-title">{{$post->content}}</h4><hr>
            <p class="card-text ml-auto">Autorius: {{$post->user->name}} Paskelbta: {{$post->created_at}}</p>
            @if (Auth::check())
                @if(Auth::user()->id == $post->user_id)
            <a href="/forum/{{$post->id}}/edit" title="Redaguoti Temą" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <form action={{ route('forum.destroy', ['id' => $post->id]) }} method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" title="Trinti Temą" style="max-width: 80rem;" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></i></button>
            </form>
                @endif
            @else
                <p></p>
            @endif
        </div>
    </div>
    <br>
    @foreach($post->comments as $comment)
        <div class="card border-dark mb-3" style="max-width: 80rem;" data-commentid="{{$comment->id}}">
            <div class="card-header">{{$comment->user->name}}</div>
            <div class="card-body">
                <h4 class="card-title">{{$comment->body}}</h4>
                <p class="card-text">Autorius: {{$comment->user->name}} Paskelbta: {{$comment->created_at}}</p>
                <div class="likes-container">
                    <a href="#" class="like">Like: <i class="fas fa-thumbs-up"></i></a>
                    <a href="#" class="like">Dislike: <i class="fas fa-thumbs-down"></i></a>
                </div>
            {{--  komentaro editinimas ir trynimas  --}}
            @if (Auth::check())
                @if(Auth::user()->id == $comment->user_id)
            {{--  <a href="/forum/{{$post->id}}/edit" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>  --}}
            
            <a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{$comment->id}}">Redaguoti</a>
            <div class="modal fade" id="{{$comment->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="comment-form">
    
                                <form action={{route('comment.update', ['id'=>$comment->id])}} method="post" role="form">
                                    @csrf
                                   
                                    <h3>Redaguoti Komentarą</h3>
    
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="body" id="" placeholder="Input..." value="{{$comment->body}}">
                                    </div>
    
                                    <input type="hidden" name="_method" value="PUT">
                                    <button type="submit" class="btn btn-primary">Redaguoti</button>
                                </form>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--  Forma komentaro trynimui  --}}
            <form action={{ route('comment.destroy', ['id' => $comment->id]) }} method="POST">
                
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></i></button>
            </form>
                @endif
            @else
                <p></p>
            @endif
            </div>
        </div>
        {{--  Reply kurimo forma  --}}
        <button class="btn btn-xs btn-default" onclick="toggleReply('{{$comment->id}}')">Atsakyti</button>
        <div class="reply-form-{{$comment->id}}" style="max-width: 60rem;display:none">
            <form action={{route('replycomment.store', ['id' => $comment->id])}} method="post">
                @csrf
                <h5>Rašyti Atsakymą</h5>
                                    
                <div class="form-group">
                    <input type="text" class="form-control" name="body" id="">
                </div>
                                    
                <button type="submit" class="btn btn-primary">Atsakyti</button>
            </form>
        </div>
        {{--  replies  --}}
            @foreach($comment->comments as $reply)
                <div class="card border-secondary ml-auto" style="max-width: 60rem;">
                    <div class="card-header">{{$reply->user->name}}</div>
                    <div class="card-body">
                        <h4 class="card-title">{{$reply->body}}</h4>
                        <p class="card-text">Autorius: {{$reply->user->name}} Paskelbta: {{$reply->created_at}}</p>
                        <div class="likes-container">
                            <a href="#" class="like">Like: <i class="fas fa-thumbs-up"></i></a>
                            <a href="#" class="like">Dislike: <i class="fas fa-thumbs-down"></i></a>
                        </div>
                    {{--  reply editinimas ir trynimas  --}}
                    @if (Auth::check())
                        @if(Auth::user()->id == $reply->user_id)
        
                    <a class="btn btn-primary btn-xs" data-toggle="modal" href="#{{$reply->id}}">Redaguoti</a>
                    <div class="modal fade" id="{{$reply->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="comment-form">

                                        <form action={{route('comment.update', ['id'=>$reply->id])}} method="post" role="form">
                                        @csrf
                               
                                            <h3>Redaguoti Atsakymą</h3>

                                            <div class="form-group">
                                                <input type="text" class="form-control" name="body" id="" placeholder="Input..." value="{{$reply->body}}">
                                            </div>

                                            <input type="hidden" name="_method" value="PUT">
                                            <button type="submit" class="btn btn-primary">Atsakyti</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--  Forma reply trynimui  --}}
                    <form action={{ route('comment.destroy', ['id' => $reply->id]) }} method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></i></button>
                    </form>
                        @endif
                    @else
                        <p></p>
                    @endif
                    </div>
                </div>
            @endforeach
            
            <br>
    @endforeach
    <br>

    {{--  Naujo Komentaro Kurimas  --}}
    <div class="jumbotron"  style="max-width: 80rem;" aria-label="Third group">
        <form action={{route('postcomment.store', ['id' => $post->id])}} method="post">
            @csrf
            <h3>Rašyti Komentarą</h3>

            <div class="form-group">
                <input type="text" class="form-control" name="body" id="">
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