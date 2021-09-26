


<div class="bg-white border-2 border-blue-400 rounded-3xl p-5">
    <form action="" method="post" enctype="multipart/form-data">
        <!--<editor-fold desc="Description">-->
        <div>
            <label for="body" hidden></label>
            <textarea
                name="body"
                id="body"
                class='w-full px-4 py-2 rounded-xl resize-none form-textarea text-md bg-gray-50'
                rows="3"
                placeholder="What's Up Bro ..!"
            ></textarea>
        </div>
        <!--</editor-fold>-->
        <div class='mt-3'>
            <x-jet-input type="file"></x-jet-input>
        </div>
        <div class="mt-14 relative">
            <x-jet-button class="px-12 py-1 text-md font-bold absolute bottom-0 right-0">POST</x-jet-button>
        </div>

    </form>
</div>
