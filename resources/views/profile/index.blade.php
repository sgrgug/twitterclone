<x-app-layout>
    
    <div class="w-[46%] m-auto border-[1px]">
        <div class="flex items-center space-x-9 py-1 px-5">
            <div class="font-bold text-lg">
                <a href="{{ url()->previous() }}"><ion-icon name="arrow-back-outline"></ion-icon></a>
            </div>
            <div>

                @if ($username == Auth::user()->username)
                    <div class="font-bold text-xl">{{ auth()->user()->name }}</div>
                    <div class="text-zinc-500 text-sm">{{ $auth_user_tweet_count }} Tweets</div>
                @else
                    <div class="font-bold text-xl">{{ $username }}</div>
                    <div class="text-zinc-500 text-sm">{{ $profile_visited_user_no_of_tweets }} Tweets</div>
                @endif
            </div>
        </div>

        <div class="h-72">
            <div class="relative h-[75%] bg-slate-300">
                <img class="absolute -bottom-14 left-10 h-28 rounded-full" src="{{ asset('/assets/images/'. Auth::user()->photo) }}" alt="">
            </div>

            @if (Auth::user()->username == $username)
                {{-- <a href="#" class="border-[1px] border-zinc-300 rounded-full float-right px-5 py-1 font-bold my-2 mx-10">Edit Profile</a> --}}
                <form action="" method="post">  
                    @csrf
                    <input class="hover:bg-zinc-200 duration-300 border-[1px] border-zinc-300 rounded-full float-right px-5 py-1 font-bold my-2 mx-10 cursor-pointer" type="submit" value="Edit Profile">
                </form>
            @else
                @if ($check_follow_status)
                    <form action="{{ route('profile.unfollow', $username) }}" method="post">  
                        @csrf
                        <input class="duration-300 border-[1px] border-zinc-300 rounded-full float-right px-5 py-1 font-bold my-2 mx-10 cursor-pointer hover:text-red-500 hover:bg-red-100 hover:border-red-500" onmouseover="this.value = 'Unfollow'" onmouseout="this.value = 'Following'" type="submit" value="Following">
                    </form>
                @else
                    <form action="{{ route('profile.follow', $username) }}" method="post">  
                        @csrf
                        <input class="bg-black text-white border-[1px] border-zinc-300 rounded-full float-right px-5 py-1 font-bold my-2 mx-10 cursor-pointer" type="submit" value="Follow">
                    </form>
                @endif
            @endif

        </div>

        @if (Auth::user()->username == $username)
            <div class="px-3">
                <div class="font-bold text-xl">{{ Auth::user()->name }}</div>
                <div class="flex items-center">
                    <div class="text-zinc-500">@</div>
                    <div class="text-zinc-500">
                        {{ Auth::user()->username }}
                    </div>
                    @if (Auth::user()->blue_tick == 0)
                        <div class="flex justify-between items-center bg-pri-100 rounded-full text-white text-xl mx-1">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="flex items-center px-2 py-4 space-x-5">
                <a class="hover:underline" href="{{ route('profile.following', Auth::user()->username) }}"><span class="font-bold">{{$user_followers->count()}}</span> <span class="text-zinc-500">Following</span></a>
                <a class="hover:underline" href="{{ route('profile.followers', Auth::user()->username) }}"><span class="font-bold">{{$user_following->count()}}</span> <span class="text-zinc-500">Followers</span></a>
                {{-- @foreach ($user_followers as $user_follower)
                    {{ $user_follower->name }}
                @endforeach --}}
            </div>

        @else
            <div class="px-3">
                <div class="font-bold text-xl">{{ $username_info->name }}</div>
                <div class="flex items-center">
                    <div class="text-zinc-500">@</div>
                    <div class="text-zinc-500">
                        {{ $username_info->username }}
                    </div>
                    @if ($username_info->blue_tick == 0)
                        <div class="flex justify-between items-center bg-pri-100 rounded-full text-white text-xl mx-1">
                            <ion-icon name="checkmark-circle-outline"></ion-icon>
                        </div>
                    @endif
                </div>
            </div>
            
            
            <div class="flex items-center px-2 py-4 space-x-5">
                <a class="hover:underline" href="{{ route('profile.following', $username) }}">
                    <span class="font-bold">{{$visited_user_followers->count()}}</span> <span class="text-zinc-500">Following</span>
                </a>
                <a class="hover:underline" href="{{ route('profile.followers', $username) }}">
                    <span class="font-bold">{{$visited_user_following->count()}}</span> <span class="text-zinc-500">Followers</span>
                </a>
                {{-- @foreach ($user_followers as $user_follower)
                    {{ $user_follower->name }}
                @endforeach --}}
            </div>
        @endif

        {{-- Tweets --}}

        @if (Auth::user()->username == $username)
            <h1 class="font-bold px-16 py-5">Tweets</h1>
            <div>
                @foreach ($tweets as $tweet)
                
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
                

                @endforeach
            </div>
        @else 
        <h1 class="font-bold px-16 py-5">Tweets</h1>
        <div>
            @foreach ($tweets as $tweet)
            
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
            

            @endforeach
        </div>
        @endif
    
    </div>


</x-app-layout>
