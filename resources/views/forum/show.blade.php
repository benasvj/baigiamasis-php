@extends('layouts.app')

@section('content')
    <div class="card text-white bg-dark mb-3" style="max-width: 80rem;">
        <div class="card-header">{{$post->title}}</div>
        <div class="card-body">
            <h4 class="card-title">{{$post->content}}</h4>
            <p class="card-text">Autorius: {{$post->user->name}} Paskelbta: {{$post->created_at}}</p>
            @if (Auth::check())
                @if(Auth::user()->id == $post->user_id)
            <a href="/forum/{{$post->id}}/edit" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <form action={{ route('forum.destroy', ['id' => $post->id]) }} method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" style="max-width: 80rem;" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></i></button>
            </form>
                @endif
            @else
                <p></p>
            @endif
        </div>
    </div>
    <br>
    @foreach($post->comments as $comment)
        <div class="card border-dark mb-3" style="max-width: 80rem;">
            <div class="card-header">{{$comment->user->name}}</div>
            <div class="card-body">
                <h4 class="card-title">{{$comment->body}}</h4>
                <p class="card-text">Autorius: {{$comment->user->name}} Paskelbta: {{$comment->created_at}}</p>
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
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            {{--  Delete Form  --}}
            <form action={{ route('comment.destroy', ['id' => $comment->id]) }} method="POST">
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


    <div class="jumbotron"  style="max-width: 80rem;">
        <form action={{route('postcomment.store', ['id' => $post->id])}} method="post">
            @csrf
            <h2>Rašyti Komentarą</h2>

            <div class="form-group">
                <input type="text" class="form-control" name="body" id="">
            </div>

            <button type="submit" class="btn btn-primary">Komentuoti</button>
        </form>
    </div>
@endsection
