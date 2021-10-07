


<div class="flex justify-between">
    <div class="flex items-center">
        <div>
            <img src="{{ $post->user->profile_photo_url }}" alt="profile" class="rounded-full object-scale-down"
                 style="max-height: 2.75rem !important;"
                 width="45">
        </div>
        <div class="ml-2">
            <h1 class="font-bold text-md p-0 m-0">
                {{ $post->user->name }}
                <span class="text-xs font-mono text-gray-400 m-0 p-0 block">
                    {{ $post->created_at->diffForHumans()}}
                </span>
            </h1>
        </div>
    </div>
    @if(auth()->id() === $post->user->id)
        <div>
            <form action="{{ route('deletePost', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <i class="far fa-trash-alt text-red-400 hover:text-red-600"></i>
                </button>
            </form>
        </div>
    @endif
</div>

<div class="px-14 py-4">
    @if(isset($post->body))
        <span class="text-gray-600 text-sm space-y-6 font-bold">{!! $post->body !!}</span>
    @endif
    @if(isset($post->thumbnail))
        <img
            src="{{ asset('storage/' . $post->thumbnail ) }}"
            alt="profile"
            class="rounded-3xl w-full mt-5 object-scale-down"
            style="max-height: 30rem;"
        >
    @endif
</div>
