


<div class="bg-white border-2 border-blue-400 overflow-hidden shadow-xl rounded-lg mt-14 p-5">
    @foreach($posts as $post)
        <div class="{{ $loop->last ? '' : 'mb-3' }}">
            <x-post :post="$post"></x-post>
        </div>
        @if(!$loop->last)
            <hr class="m-0 border-1 border-blue-400 mb-6">
        @endif
    @endforeach
</div>
