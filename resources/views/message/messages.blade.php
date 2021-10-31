

<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <div class="mt-4 border border-blue-400 focus:border-blue-800 bg-white">

            <div class="border-b border-blue-400 p-2">
                <a href="{{ route('profileTimeline', $user->username) }}" class="flex items-center">
                    <img
                        src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                        width="40"
                        height="40"
                        class="bg-indigo-100 rounded-full object-scale-down"
                    >
                    <h1 class="ml-3">{{ $user->name }}</h1>
                </a>
            </div>

            <div class="p-3 h-100 overflow-y-scroll overscroll-auto">
                @foreach($messages as $message)
                    <div class="flex mb-3 items-center {{ $message->user->id === auth()->id() ? 'justify-end' : '' }}">
                        @if( $message->user->id === auth()->id())
                            <div class="text-sm text-white max-w-sm bg-blue-400 mr-2 rounded-2xl p-2">
                                {{ $message->body }}
                            </div>
                        @endif
                        <img
                            src="{{ $message->user->profile_photo_url }}"
                            alt="profile"
                            class="rounded-full h-8 h-8"
                        >
                        @if( $message->user->id !== auth()->id())
                            <div class="text-sm text-white max-w-sm bg-blue-400 ml-2 rounded-2xl p-2">
                                {{ $message->body }}
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>

        </div>

        <form action="{{ route('sendMessage', $user->username) }}" class="bg-white border border-blue-400" method="post">
            @csrf
            <x-jet-input name="body" class="py-1 px-2 w-full" required autofocus></x-jet-input>
        </form>

    </div>
    <div hidden>
        <div id="top">top</div>
        <div id="bottom">bottom</div>
    </div>
    <script>
        function top() {
            document.getElementById( 'top' ).scrollIntoView();
        }

        function bottom() {
            document.getElementById( 'bottom' ).scrollIntoView();
            window.setTimeout( function () { top(); }, 2000 );
        }

        bottom();
    </script>
</x-app-layout>


