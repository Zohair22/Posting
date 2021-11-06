

<div class="max-w-xl mx-auto sm:px-6 lg:px-8">
    @if(auth()->user()->myRequestFollow($user))
        <div class="m-2 flex justify-between">
            <div></div>
            <form
                action="{{ route('acceptFollow') }}"
                  method="post">
                @csrf
                @method('PATCH')
                <button
                    type="submit"
                    class="bg-indigo-700 hover:bg-indigo-800 text-white border px-4 py-1 text-sm font-semibold rounded-3xl"
                >
                    Accept request follow
                </button>
            </form>
        </div>
    @endif
    <div class="flex p-2">
        <div>
            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                 class="bg-blue-200 rounded-full h-24 w-24 object-scale-down">
        </div>
        <div class="ml-6 pt-5 flex-1">
            <div class="flex justify-between">
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
                @elseif(auth()->user()->following($user))
                    <x-message-button :user="$user"></x-message-button>
                    <x-unFollow-botton :user="$user"></x-unFollow-botton>
                @else
                    @if($user->valid)
                        <x-message-button :user="$user"></x-message-button>
                    @endif
                    <x-follow-botton :user="$user"></x-follow-botton>
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
