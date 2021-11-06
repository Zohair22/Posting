

<div class="col-span-1"></div>
@if(auth()->user()->followed->count() > 0)
    <div class="col-span-3 bg-white border-2 border-blue-400 rounded-3xl rounded-r-none shadow-lg overflow-y-auto h-96">
        @foreach(auth()->user()->followed as $follows)
            <div
                class="@if(! $loop->last) border-b border-blue-50 @endif py-2 text-sm px-4 hover:bg-indigo-500
                    hover:text-white transition transform"
            >
                <a href="{{ route('profileTimeline', $follows->username) }}" class="flex items-center font-bold">
                    <div class="mr-2">
                        <img
                            src="{{ $follows->profile_photo_url }}"
                            alt="profile"
                            width="30"
                            height="30"
                            class="rounded-full object-scale-down"
                        >
                    </div>
                    {{ $follows->name }}
                </a>
            </div>
        @endforeach
    </div>
@else
    <div class="col-span-2"></div>
@endif
