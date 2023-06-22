<x-app-layout>
    
    <div class="w-[45%] m-auto border-[1px]">
        <h1 class="font-bold text-xl p-4 sticky top-0 border-b-[1px] bg-white bg-opacity-30 backdrop-filter backdrop-blur-lg z-10">{{ __('Home') }}</h1>
        <div class="border-b-[1px] p-4 grid grid-cols-12">
            <div class="col-span-1">
                <img class="h-12 rounded-full" src="{{ asset('/assets/images/'. Auth::user()->photo) }}" alt="">
            </div>
            <div class="px-3 col-span-11">
                <form action="{{ route('tweet_store', ) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <span class="flex items-center w-fit hover:bg-tri-100 duration-200 ease-in text-pri-100 border-[1px] rounded-full px-3 cursor-pointer font-bold">Everyone<ion-icon class="pl-2" name="chevron-down-outline"></ion-icon></span>

                    <textarea id="tweet-textarea" class="w-full resize-none border-0 focus:ring-transparent rounded-md p-2 overflow-hidden text-xl" rows="1" max="10" maxlength="100" placeholder="What is happening?!" name="tweet"></textarea>
                    
                    <div class="px-3 flex items-center w-fit hover:bg-tri-100 duration-200 ease-in rounded-full cursor-pointer text-pri-100 font-bold"><ion-icon class="pr-2" name="globe-outline"></ion-icon>Everyone can reply</div>
                    
                    <hr class="my-3">

                    <div class="flex justify-between items-center space-x-2">
                        <div class="flex space-x-1">
                            <ion-icon class="text-xl p-2 hover:bg-tri-100 rounded-full duration-200 ease-in cursor-pointer text-pri-100 font-bold" name="image-outline"></ion-icon>
                            {{-- <input type="file" name="" id=""> --}}
                            <ion-icon class="text-xl p-2 hover:bg-tri-100 rounded-full duration-200 ease-in cursor-pointer text-pri-100 font-bold" name="gift"></ion-icon>
                            <ion-icon class="text-xl p-2 hover:bg-tri-100 rounded-full duration-200 ease-in cursor-pointer text-pri-100 font-bold" name="options-outline"></ion-icon>
                            <ion-icon class="text-xl p-2 hover:bg-tri-100 rounded-full duration-200 ease-in cursor-pointer text-pri-100 font-bold" name="happy-outline"></ion-icon>
                            <ion-icon class="text-xl p-2 hover:bg-tri-100 rounded-full duration-200 ease-in cursor-pointer text-pri-100 font-bold" name="timer-outline"></ion-icon>
                            <ion-icon class="text-xl p-2 hover:bg-tri-100 rounded-full duration-200 ease-in cursor-pointer text-pri-100 font-bold" name="location-outline"></ion-icon>
                        </div>
                        <div>
                            <input class="rounded-full bg-pri-100 hover:bg-sec-100 px-4 py-2 cursor-pointer font-bold text-white" type="submit" value="Tweet">
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="h-screen bg-green-100 m-2">
            id
            post
            location
            photo
            like
            comment
            view
            share
            retweet
        </div>
    </div>

</x-app-layout>
