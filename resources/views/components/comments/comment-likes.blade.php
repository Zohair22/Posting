



<div class="p-0">
    <?php
    if ($comment->userLikeIt()->count() > 0)
    {
        $action =  'dislikePost';
        foreach($comment->userLikeIt() as $like)
        {
            $id = $like->id;
        }
    }else{
        $action =  'likePost';
        $id = $comment->id;
    }
    ?>
    <form
        action="{{ route($action, $id) }}"
        method="post"
    >
        @csrf
        @if ($comment->userLikeIt()->count() > 0)
            @method('DELETE')
        @endif
        <button type="submit" class="{{ $comment->userLikeIt()->count() ? 'text-red-500' : '' }} hover:text-red-500">
            <i class="far fa-thumbs-up"></i>
            {{ $comment->postLikeCount() }}
        </button>
    </form>
</div>
