


<div class="flex items-center">
    <div>
        <img
            src="{{ $comment->user->profile_photo_url }}" alt="profile" class="rounded-full object-scale-down"
            style="max-height: 2.5rem !important;"
            width="35"
        >
    </div>
    <div class="ml-2">
        <h1 class="font-bold text-md p-0 m-0">
            {{ $comment->user->name }}
            <span class="text-xs font-mono text-gray-400 m-0 p-0 block">
                {{ $comment->created_at->diffForHumans()}}
            </span>
        </h1>
    </div>
</div>

<div class="px-14">
    @if(isset($comment->body))
        <span class="text-gray-600 text-sm space-y-6 font-bold">{!! $comment->body !!}</span>
    @endif
    @if(isset($comment->thumbnail))
        <img
            src="{{ asset('storage/' . $comment->thumbnail ) }}" alt="profile"
            class="rounded-3xl w-full mt-5 object-scale-down" style="max-height: 30rem;"
        >
    @endif
</div>
