

<div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
    <div class="flex p-4">
        <div>
            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                 class="bg-blue-100 rounded-full h-48 w-48 object-scale-down">
        </div>
        <div class="ml-6 pt-5">
            <div class="flex">
                <h1 class="font-bold text-xl">{{ $user->username }}</h1>
                @if(auth()->user()->id === $user->id)
                    <div class="ml-4">
                        <a
                            href="{{ route('profile.show') }}"
                            class="bg-white text-indigo-500 hover:text-indigo-800 border px-4 py-1 text-sm font-semibold"
                        >
                            Edit Profile
                        </a>
                    </div>
                @endif
            </div>
            <div class="flex justify-between mt-4">
                <div class="text-sm font-semibold">{{ $posts->count() }} Posts</div>
                <div class="ml-4 text-sm font-semibold text-blue-600">{{ $user->follower->count() }} Followers</div>
                <div class="ml-4 text-sm font-semibold text-blue-800">{{ $user->follows->count() }} Following</div>
            </div>
            <div class="mt-4">
                <h1 class="text-lg font-semibold">{{ $user->name }}</h1>
                <h1 class="text-sm">{{ $user->about }}</h1>
            </div>
        </div>
    </div>
</div>
