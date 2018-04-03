<div class="container-show-post">
    <div class="post-header">
        <div class="post-header-date">
            <p>{{$post->created_at}}</p>
        </div>
        <div class="post-header-modify">
            @if (Auth::check())
                @if(Auth::user()->id == $post->user_id)
                <div class="edit-and-delete">
                    <a href="/forum/{{$post->id}}/edit" title="Redaguoti Temą" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                    <form action={{ route('forum.destroy', ['id' => $post->id]) }} method="POST" class="edit-and-delete">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" title="Trinti Temą" style="max-width: 80rem;" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></i></button>
                    </form>
                </div>
                @endif
            @else
                <p></p>
            @endif
        </div>
    </div>
    <div class="show-post-main">
        <div class="show-post-left">
            <h3>{{$post->user->name}}</h3>
            <div class="icon-container"><img src="/storage/user_images/{{$post->user->user_image}}"  alt="xxx"></div>
            <p>Sukūrė temų: {{$post->user->posts->count()}}</p>
        </div>
        <div class="show-post-right">
            <h2>{{$post->title}}</h2>
            <hr>
            <p>{{$post->content}}</p>
            <hr>
            <div class="show-post-footer">
                <p>Autorius: {{$post->user->name}} , {{$post->created_at}}</p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>