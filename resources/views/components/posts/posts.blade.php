


@if($posts->count() > 0)
    @foreach($posts as $post)
        <div class="bg-gray-100 border-2 border-blue-400 overflow-hidden shadow-lg rounded-3xl  mt-4 p-5">
            <div x-data="{ open: false }">
                <x-posts.post :post="$post"></x-posts.post>
            </div>
        </div>
    @endforeach
@else
    <div class="text-center text-red-600 font-bold bg-gray-100 border-2 border-blue-200 overflow-hidden shadow-lg rounded-xl
     mt-4 p-5">
        THERE ARE NO POSTS FOR YOU YET...
    </div>
@endif
