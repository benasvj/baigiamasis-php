<div class="box-forum-list">
        @forelse($posts as $post)
            <div class="post-name">
                <a href={{route('forum.show', ['id' => $post->id]) }} class="post-name-link">{{$post->title}}</a>
            </div>
            <div class="box-post-container">
                <div class="box-post-left">
                    <h6>{{ str_limit($post->content,70) }}</h6>
                    <hr>
                    <p>Paskelbė: <span>{{$post->user->name}}, {{$post->created_at}}</span></p>
                </div>
                <div class="box-post-right">
                    @php
                        if($post->comments->count()>0){
                            $lastone = $post->comments->pluck('user_id')->last();
                            $lastoneDate = $post->comments->pluck('created_at')->last();
                        }
                    @endphp
                    @if($lastone!==null)
                        <p>Paskutinis:<br> <span>{{\App\User::find($lastone)->name}}, <br>{{$lastoneDate}}</span></p>
                    @elseif($post->comments->count()<0)
                        <p>bbs</p>
                    @endif
                    <p>Atsakymų: <span>{{$post->comments->count()}}</span></p>
                </div>
                <div class="clearfix"></div>
            </div>
        <br>
        @empty
            <h5>Temų nėra</h5>
        @endforelse
        {{ $posts->links() }}
        <br>
        
</div>
