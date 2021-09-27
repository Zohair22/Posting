

<div class="">
    <?php
    if ($post->userLikeIt()->count() > 0)
    {
        $action =  'dislikePost';
        foreach($post->userLikeIt() as $like)
        {
            $id = $like->id;
        }
    }else{
        $action =  'likePost';
        $id = $post->id;
    }
    ?>
    <form
        action="{{ route($action, $id) }}"
        method="post"
    >
        @csrf
        @if ($post->userLikeIt()->count() > 0)
            @method('DELETE')
        @endif
        <button type="submit" class="{{ $post->userLikeIt()->count() ? 'text-red-500' : '' }}">
            <i class="far fa-thumbs-up hover:text-red-500"></i>
            {{ $post->postLikeCount() }}
        </button>
    </form>
</div>
