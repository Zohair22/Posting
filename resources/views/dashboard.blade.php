

<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <x-posts.poster></x-posts.poster>
            <x-posts.posts :posts="$posts"></x-posts.posts>
        </div>
    </div>
</x-app-layout>
