<div class="modal fade" id="{{$comment->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                </div>
                <div class="modal-body">
                    <div class="comment-form">

                        <form action={{route('replycomment.store', ['id' => $comment->id])}} method="post">
                            @csrf
                            <h5>Rašyti Atsakymą</h5>
                                                
                            <div class="form-group">
                                <input type="text" class="form-control" name="body" id="">
                            </div>
                                                
                            <button type="submit" class="btn btn-primary">Atsakyti</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
</div>