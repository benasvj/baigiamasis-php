
@foreach($post->comments as $comment)
    <br>
    <div class="container-show-post-com">
        <div class="post-header-com">
            <div class="post-header-date-com">
                <p>{{$comment->created_at}}</p>
            </div>
            <div class="post-header-modify-com">
                @if (Auth::check())
                    @if(Auth::user()->id == $comment->user_id)
                    <a class="btn btn-info btn-sm edit-and-delete-com" data-toggle="modal" href="#{{$comment->id}}" title="Redaguoti Komentarą"><i class="fas fa-edit"></i></a>
                    <div class="modal fade" id="{{$comment->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="comment-form">
                                        <form action={{route('comment.update', ['id'=>$comment->id])}} method="post" role="form" class="edit-and-delete-com">
                                            @csrf
                                       
                                            <h3>Redaguoti Komentarą</h3>
        
                                            <div class="form-group">
                                                <textarea class="form-control" id="article-ckeditor" name="body" rows="7">{{$comment->body}}</textarea>
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
                    <form action={{ route('comment.destroy', ['id' => $comment->id]) }} method="POST" class="edit-and-delete-com">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm" title="Trinti Komentarą"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    @endif
                @else
                    <p></p>
                @endif
            </div>
        </div>
        <div class="show-post-main-com" data-commentid="{{$comment->id}}">
            <div class="show-post-left-com">
                <h3>{{$comment->user->name}}</h3>
                <div class="icon-container-com"><img src="/storage/photo.jpg" alt="xxx"></div>
                <p>Sukūrė temų: {{$comment->user->posts->count()}}</p>
            </div>
            <div class="show-post-right-com">
                <p>{{$comment->body}}</p>
                <hr>
                <div class="show-post-footer-com">
                    <a href="#" class="like">Like: <i class="fas fa-thumbs-up"></i></a>
                    <a href="#" class="like">Dislike: <i class="fas fa-thumbs-down"></i></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <br>
    {{--  Reply kurimo forma  --}}
        <button class="btn btn-xs btn-default-{{$comment->id}}" onclick="toggleReply('{{$comment->id}}')">Atsakyti</button>
        <div class="reply-form-{{$comment->id}}" style="max-width: 60rem;display:none">
            <form action={{route('replycomment.store', ['id' => $comment->id])}} method="post">
                @csrf
                <h5>Rašyti Atsakymą</h5>
                                        
                <div class="form-group">
                    <textarea class="form-control" id="article-ckeditor" name="body" rows="10"></textarea>
                </div>
                                        
                <button type="submit" class="btn btn-primary">Atsakyti</button>
            </form>
        </div>
        <br><br><br>
        {{--  replies  --}}
        @foreach($comment->comments as $reply)
            <div class="container-show-post-rep">
                <div class="post-header-rep">
                    <div class="post-header-date-rep">
                        <p>{{$reply->created_at}}</p>
                    </div>
                    <div class="post-header-modify-rep">
                        @if (Auth::check())
                            @if(Auth::user()->id == $reply->user_id)
                            <a class="btn btn-info btn-sm edit-and-delete-rep" data-toggle="modal" href="#{{$reply->id}}" title="Redaguoti Komentarą"><i class="fas fa-edit"></i></a>
                            <div class="modal fade" id="{{$reply->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="comment-form">
                                                <form action={{route('comment.update', ['id'=>$reply->id])}} method="post" role="form" class="edit-and-delete-com">
                                                    @csrf
                                                   
                                                    <h3>Redaguoti Komentarą</h3>
                    
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="article-ckeditor" name="body" rows="7">{{$reply->body}}</textarea>
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
                            <form action={{ route('comment.destroy', ['id' => $reply->id]) }} method="POST" class="edit-and-delete-rep">
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
                <div class="show-post-main-rep" data-commentid="{{$reply->id}}">
                    <div class="show-post-left-rep">
                        <h3>{{$reply->user->name}}</h3>
                        <div class="icon-container-rep"><img src="/storage/photo.jpg" alt="xxx"></div>
                        <p>Sukūrė temų: {{$reply->user->posts->count()}}</p>
                    </div>
                    <div class="show-post-right-rep">
                        <p>{{$reply->body}}</p>
                        <hr>
                        <div class="show-post-footer-rep">
                            <a href="#" class="like">Like: <i class="fas fa-thumbs-up"></i></a>
                            <a href="#" class="like">Dislike: <i class="fas fa-thumbs-down"></i></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <br>
        @endforeach
    @endforeach
