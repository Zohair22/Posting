


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
