<x-app-layout>
    
    <div class="w-1/2 m-auto border-[1px]">
        <h1 class="font-bold text-xl p-4 sticky top-0 border-b-[1px]">Home</h1>
        <div class="border-b-[1px]">
            <form action="" method="post">
                @csrf
                <textarea id="tweet-textarea" class="w-full resize-none border-0 focus:ring-transparent rounded-md p-2 overflow-hidden text-xl" rows="1" placeholder="What is happening?!"></textarea>
                <button class="ml-2 px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600">Tweet</button>
                  
            </form>
        </div>


        <div class="h-screen bg-green-100 m-2"></div>
    </div>

</x-app-layout>
