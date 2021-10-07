

<x-app-layout>
    <div class="py-4">
        @include('profile.profile-header')
        <hr class="mt-6">
        <div class="max-w-3xl mx-auto">
            <x-posts.posts :posts="$posts"></x-posts.posts>
        </div>
    </div>
</x-app-layout>
