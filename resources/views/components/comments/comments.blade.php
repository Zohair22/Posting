
<div x-show="open" class="bg-white text-sm border shadow-2xl rounded-3xl">
    @if($post->comments->count() > 0)
        @foreach($post->comments as $comment)
            <div class="{{ $loop->last ? '' : 'border-b border-gray-400' }} px-3 pt-3 pb-1">
                <x-comments.comment :comment="$comment"></x-comments.comment>
                <div class="border-t border-gray-200 mt-2 px-20">
                    <x-comments.comment-likes :comment="$comment" class="flex-1"></x-comments.comment-likes>
                </div>
            </div>
        @endforeach
    @else
        <div class="text-center bg-gray-200 rounded-3xl text-gray-600">
            NO COMMENTS HERE
        </div>
    @endif
</div>
