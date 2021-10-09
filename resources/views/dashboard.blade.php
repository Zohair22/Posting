

<x-app-layout>
    <div class="py-12 bg-fixed">
        <div class="grid grid-cols-12">
            @if(auth()->user()->follows)
                <x-left-side></x-left-side>
            @endif
            <div class="sm:px-6 lg:px-8 col-span-7">
                <x-posts.poster></x-posts.poster>
                <x-posts.posts :posts="$posts"></x-posts.posts>
            </div>
            @if(auth()->user()->follows)
                <div class="col-span-1"></div>
            @endif
        </div>
    </div>
</x-app-layout>
