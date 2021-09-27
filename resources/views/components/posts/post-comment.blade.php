

<div class="border-t border-blue-400 px-14 p-0 pt-2 m-0">
    @if($post->comments->count() > 0)
        <x-comments.comments :post="$post"></x-comments.comments>
    @endif
    <form action="" class="mt-2">
        <x-jet-input
            name="body"
            class="w-full border border-indigo-400 px-1 text-sm"
            placeholder="Leave a comment!."
        ></x-jet-input>
    </form>
</div>




