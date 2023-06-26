<x-app-layout>
    
    <div class="w-[46%] m-auto border-[1px]">
        
        
        <div class="flex items-center space-x-3 py-1 px-5 sticky top-0 z-10 bg-white bg-opacity-30 backdrop-filter backdrop-blur-lg">
            <a href="{{ url()->previous() }}"><ion-icon name="arrow-back-outline"></ion-icon></a>
            <h1 class="font-bold text-xl p-4">{{ __('Tweet') }}</h1>
        </div>


        <div class="grid grid-cols-12 hover:bg-zinc-100 cursor-pointer p-4">
            <div class="col-span-1">
                <img class="w-10 object-cover rounded-full" src="{{ asset('/assets/images/'. $tweet->user->photo) }}" alt="">
            </div>
            <div class="col-span-10">
                <div class="flex items-center space-x-1">
                    <a href="" class="font-bold hover:underline">{{ $tweet->user->name }}</a>
                    @if ($tweet->user->blue_tick == 0)
                        <ion-icon class="text-white rounded-full font-bold bg-pri-100" name="checkmark-circle-outline"></ion-icon>
                    @endif
                    <div class="text-zinc-600">
                        {{ __('@') }}{{ $tweet->user->username }}
                        {{ __('·') }}
                        {{ $tweet->created_at->diffForHumans() }}
                    </div>
                </div>
                <a href="{{ route('showtweet', $tweet->id) }}">
                    <div class="mb-4">
                        {{ $tweet->tweet }}
                    </div>
                </a>
                <div class="flex justify-between text-md">
                    <div class="p-2 hover:bg-blue-100 hover:text-blue-700 duration-300 rounded-full">
                        <a class="flex items-center" href="#">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                            <span>23</span>
                        </a>
                    </div>
                    <div class="p-2 hover:bg-green-100 hover:text-green-700 duration-300 rounded-full">
                        <a href="#"><ion-icon name="git-compare-outline"></ion-icon></a>
                    </div>
                    <div class="p-2 hover:bg-red-100 hover:text-red-700 duration-300 rounded-full">
                        <a href="#"><ion-icon name="heart-outline"></ion-icon></a>
                    </div>
                    <div class="p-2 hover:bg-blue-100 hover:text-blue-700 duration-300 rounded-full">
                        <a href="#"><ion-icon name="stats-chart-outline"></ion-icon></a>
                    </div>
                    <div class="p-2 hover:bg-blue-100 hover:text-blue-700 duration-300 rounded-full">
                        <a href="#"><ion-icon name="share-outline"></ion-icon></a>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <ion-icon class="hover:bg-blue-100 rounded-full p-3 duration-300" name="ellipsis-horizontal"></ion-icon>
            </div>

        </div>


        {{-- tweet comment form --}}
        <div class="border-b-[1px] p-4 grid grid-cols-12">
            <div class="col-span-1">
                <img class="h-12 rounded-full" src="{{ asset('/assets/images/'. Auth::user()->photo) }}" alt="">
            </div>
            <div class="px-3 col-span-11">
                <form action="{{ route('store_tweet_comment', $tweet->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <span class="text-zinc-400">Replying to <a class="text-sec-100 font-bold" href="">{{ __('@') }}{{ $tweet->user->name }}</a></span>

                    <textarea id="tweet-textarea" class="w-full resize-none border-0 focus:ring-transparent rounded-md p-2 overflow-hidden text-xl" rows="1" max="10" maxlength="100" placeholder="Tweet Your Reply!" name="tweet_comment"></textarea>
                    
                    
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
                            <input class="rounded-full bg-pri-100 hover:bg-sec-100 px-4 py-2 cursor-pointer font-bold text-white" type="submit" value="Replay">
                        </div>
                    </div>

                </form>
            </div>
        </div>
        {{-- tweet comment form --}}

       
        {{-- {{ $tweet->comment }} --}}
        @foreach ($tweet->comment as $item)
            {{-- {{$item->comment}} <br /><br/> --}}
            <div class="grid grid-cols-12 hover:bg-zinc-100 cursor-pointer p-4">
                <div class="col-span-1">
                    <img class="w-10 object-cover rounded-full" src="{{ asset('/assets/images/'. $item->user->photo) }}" alt="">
                </div>
                <div class="col-span-10">
                    <div class="flex items-center space-x-1">
                        <a href="" class="font-bold hover:underline">{{ $item->user->name }}</a>
                        @if ($item->user->blue_tick == 0)
                            <ion-icon class="text-white rounded-full font-bold bg-pri-100" name="checkmark-circle-outline"></ion-icon>
                        @endif
                        <div class="text-zinc-600">
                            {{ __('@') }}{{ $tweet->user->username }}
                            {{ __('·') }}
                            {{ $tweet->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <a href="{{ route('showtweet', $tweet->id) }}">
                        <div class="mb-4">
                            {{ $item->comment }}
                        </div>
                    </a>
                    <div class="flex justify-between text-md">
                        <div class="p-2 hover:bg-blue-100 hover:text-blue-700 duration-300 rounded-full">
                            <a class="flex items-center" href="#">
                                <ion-icon name="chatbubble-outline"></ion-icon>
                                <span></span>
                            </a>
                        </div>
                        <div class="p-2 hover:bg-green-100 hover:text-green-700 duration-300 rounded-full">
                            <a href="#"><ion-icon name="git-compare-outline"></ion-icon></a>
                        </div>
                        <div class="p-2 hover:bg-red-100 hover:text-red-700 duration-300 rounded-full">
                            <a href="#"><ion-icon name="heart-outline"></ion-icon></a>
                        </div>
                        <div class="p-2 hover:bg-blue-100 hover:text-blue-700 duration-300 rounded-full">
                            <a href="#"><ion-icon name="stats-chart-outline"></ion-icon></a>
                        </div>
                        <div class="p-2 hover:bg-blue-100 hover:text-blue-700 duration-300 rounded-full">
                            <a href="#"><ion-icon name="share-outline"></ion-icon></a>
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <ion-icon class="hover:bg-blue-100 rounded-full p-3 duration-300" name="ellipsis-horizontal"></ion-icon>
                </div>
    
            </div>
        @endforeach

    </div>


</x-app-layout>
