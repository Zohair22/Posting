

<div class="flex items-center">
    <div>
        <img src="{{ $post->user->profile_photo_url }}" alt="profile" class="rounded-full object-scale-down"
             style="max-height: 2.75rem !important;"
             width="45">
    </div>
    <div class="ml-3">
        <h1 class="font-bold text-md p-0 m-0">
            {{ $post->user->name }}
            <span class="text-xs font-mono text-gray-400 m-0 p-0 block">
                            {{ $post->created_at->diffForHumans()}}
                        </span>
        </h1>
    </div>
</div>
<div class="px-14 py-4">
    @if(isset($post->body))
        <span class="text-gray-500 text-sm space-y-6 font-bold">{!! $post->body !!}</span>
    @endif
    @if(isset($post->thumbnail))
        <img
            src="{{ asset('storage/' . $post->thumbnail ) }}"
            alt="profile"
            class="rounded-3xl w-full mt-5 object-scale-down"
            style="max-height: 20rem;"
        >
    @endif
</div>

<div class="border-t border-blue-400 m-0 p-0">
    <div class="px-20 p-0 pt-2 m-0">
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
</div>

