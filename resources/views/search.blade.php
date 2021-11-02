
<x-app-layout>
    <div class="max-w-3xl mx-auto mt-5">
        <h1 class="font-bold">
            Search about <span class="text-blue-600">{{ request('search') }}</span>
        </h1>
        <div class="mt-5 p-5 border border-gray-200 rounded-3xl">

            @if($users->count() < 1)
                <span class="text-red-600 font-bold">There's no one with this name</span>
            @endif

            @foreach($users as $user)
                <div
                    class="flex items-center justify-between p-2 rounded-3xl shadow-lg
                            @if(! $loop->last) border-b border-gray-200 @endif"
                >

                    <a href="{{ route('profileTimeline', $user->username) }}" class="flex items-center">
                        <img
                            src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                            class="bg-blue-100 rounded-full h-16 w-16 object-scale-down mr-5"
                        >
                        <h1 class="font-bold text-blue-600">
                            {{ $user->name }}
                        </h1>
                    </a>

                    <div>
                        @if(auth()->user()->following($user) or auth()->id() === $user->id)
                            @if(auth()->user()->following($user))
                                <x-unFollow-botton :user="$user"></x-unFollow-botton>
                            @endif
                        @else
                            <x-follow-botton :user="$user"></x-follow-botton>
                        @endif
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
