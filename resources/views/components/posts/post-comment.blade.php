

<div class="border-t border-blue-400 px-14 p-0 pt-2 m-0">

    <x-comments.comments :post="$post"></x-comments.comments>
    <form action="{{ route('comment', $post->id) }}" method="post" class="mt-2">
        @csrf
        <x-jet-input
            name="body"
            class="w-full border border-indigo-400 px-2 py-1 text-sm"
            placeholder="Leave a comment!."
        ></x-jet-input>
    </form>
</div>




