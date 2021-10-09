

<div class="col-span-1"></div>
<div class="col-span-2 bg-white border border-blue-300 rounded-lg rounded-r-none px-4 shadow-lg overflow-y-auto h-96">
    @foreach(auth()->user()->follows as $follows)
        <div class="@if(! $loop->last) border-b border-blue-100 @endif py-2 text-sm">
            <a href="{{ route('profileTimeline', $follows->username) }}" class="flex items-center">
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
