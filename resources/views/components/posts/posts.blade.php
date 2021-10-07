


<div class="bg-white border-2 border-blue-400 overflow-hidden shadow-lg rounded-xl mt-8 p-5">
    @foreach($posts as $post)
        <div class="{{ $loop->last ? '' : 'mb-3' }} p-0" x-data="{ open: false }">
            <x-posts.post :post="$post"></x-posts.post>
        </div>
        @if(!$loop->last)
            <hr class="m-0 border-1 border-blue-400 mb-6">
        @endif
    @endforeach
</div>
