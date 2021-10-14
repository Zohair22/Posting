

<x-app-layout>
    <div class="py-4">
        @include('profile.profile-header')
        <hr class="mt-6">
        @if(auth()->user()->following($user) or $user->valid or auth()->id() === $user->id)
            <div class="max-w-3xl mx-auto">
                <x-posts.posts :posts="$posts"></x-posts.posts>
            </div>
        @else
            <div
                class="max-w-3xl mx-auto font-bold border-gray-300 text-gray-600 mt-4 text-center bg-gray-200
                rounded-3xl p-5">
                This Account is Private
                <br>
                Follow to see their photos and videos.
            </div>
        @endif
    </div>
</x-app-layout>
