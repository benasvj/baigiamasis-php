<div class="list-group">
        @forelse($posts as $post)
            <a href="{{route('forum.show', ['id' => $post->id]) }}" class="list-group-item">
                <h4 class="list-group-item-heading">{{$post->title}}</h4>
                <p class="list-group-item-text">{{ str_limit($post->content,100) }}</p>
            </a>
        <br>
        @empty
            <h5>Temų nėra</h5>

        @endforelse
        <br>
        {{ $posts->links() }}
</div>