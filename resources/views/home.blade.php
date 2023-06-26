<x-app-layout>
    
    <div class="w-[46%] m-auto border-[1px]">
        
        <div class="sticky top-0 z-10 bg-white bg-opacity-30 backdrop-filter backdrop-blur-lg">
            <h1 class="font-bold text-xl p-4">{{ __('Home') }}</h1>

            {{-- <div class="flex items-center font-bold text-zinc-500">
                <div class="py-4 hover:bg-qaud-100 duration-300 w-full text-center cursor-pointer {{ request()->routeIs('home'. "#foryou") ? 'border-b-4 border-pri-100' : '' }}">
                    <a href="#foryou">For You</a>
                </div>
                <div class="py-4 hover:bg-qaud-100 duration-300 w-full text-center cursor-pointer {{ request()->routeIs('home'. "#following") ? 'border-b-4 border-pri-100' : '' }}">
                    <a href="#following">Following</a>
                </div>
            </div> --}}
        </div>

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

        {{-- <div class="h-screen bg-green-100 m-2">
            id
            post
            location
            photo
            like
            comment
            view
            share
            retweet

        </div> --}}
        <div>
            @foreach ($tweets as $tweet)

            {{-- <a class="inline-block w-full" href="">
                <div class="flex p-4 hover:bg-zinc-100 duration-200 ease-in-out">
                    <div class="p-2">
                        <img class="w-10 object-cover rounded-full" src="{{ asset('/assets/images/'. $tweet->user->photo) }}" alt="">
                    </div>
                    <div class="w-full">
                        <div class="flex items-center space-x-1">
                            <div class="font-bold">{{ $tweet->user->name }}</div>
                            @if ($tweet->user->blue_tick == 0)
                            <ion-icon class="text-white rounded-full font-bold bg-pri-100" name="checkmark-circle-outline"></ion-icon>
                            @endif
                            <div class="text-zinc-600">
                                {{ __('@') }}{{ $tweet->user->username }}
                                {{ __('·') }}
                                {{ $tweet->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div>
                            {{ $tweet->tweet }}
                        </div>
                    </div>
                    <div>
                        <ion-icon class="hover:bg-blue-100 rounded-full p-3 duration-300" name="ellipsis-horizontal"></ion-icon>
                    </div>
                </div>
            </a> --}}
            <div class="grid grid-cols-12 hover:bg-zinc-100 cursor-pointer p-4">
                <div class="col-span-1">
                    <img class="w-10 object-cover rounded-full" src="{{ asset('/assets/images/'. $tweet->user->photo) }}" alt="">
                </div>
                <div class="col-span-10">
                    <div class="flex items-center space-x-1">
                        <a href="{{ route('profile.index', $tweet->user->username) }}" class="font-bold hover:underline">{{ $tweet->user->name }}</a>
                        @if ($tweet->user->blue_tick == 0)
                            <ion-icon class="text-white rounded-full font-bold bg-pri-100" name="checkmark-circle-outline"></ion-icon>
                        @endif
                        <div class="text-zinc-600">
                            {{ __('@') }}{{ $tweet->user->username }}
                            {{ __('·') }}
                            {{ $tweet->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <a href="#">
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
            
            @endforeach
        </div>
    </div>


</x-app-layout>
