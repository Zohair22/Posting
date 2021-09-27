


    <x-posts.post-grid :post="$post"></x-posts.post-grid>

    <div class="border-t border-blue-400 px-20 p-0 pt-2 m-0 flex justify-between">
        <div class="flex-1">
            <x-posts.post-likes :post="$post" class="flex-1"></x-posts.post-likes>
        </div>
        <div class="flex-1">
            <i @click="open = ! open" class="hover:text-blue-500 fas fa-comment-alt cursor-pointer"></i>
        </div>
    </div>

    <x-posts.post-comment :post="$post" class="flex"></x-posts.post-comment>

