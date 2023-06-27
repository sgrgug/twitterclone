<x-app-layout>
    
    <div class="w-[46%] m-auto border-[1px]">
        <div class="flex items-center space-x-9 py-1 px-5">
            <div class="font-bold text-lg">
                <a href="{{ url()->previous() }}"><ion-icon name="arrow-back-outline"></ion-icon></a>
            </div>
            <div>

                @if ($username == Auth::user()->username)
                    <div class="font-bold text-xl">{{ auth()->user()->name }}</div>
                    {{-- <div class="text-zinc-500 text-sm">{{ $auth_user_tweet_count }} Tweets</div> --}}
                    <div class="text-zinc-500 text-sm">{{ __('@')}}{{ auth()->user()->username }}</div>
                @else
                    <div class="font-bold text-xl">{{ $username }}</div>
                    <div class="text-zinc-500 text-sm">{{ __('@')}}{{ $username }}</div>
                @endif
                
            </div>
        </div>

        <div class="flex items-center font-bold text-zinc-500">
            <div class="py-4 hover:bg-qaud-100 w-full text-center cursor-pointer {{ request()->routeIs('profile.followers', $username) ? 'bg-qaud-100 border-b-4 border-pri-100' : '' }}">
                <a href="{{ route('profile.followers', $username) }}">Followers</a>
            </div>
            <div class="py-4 hover:bg-qaud-100 w-full text-center cursor-pointer {{ request()->routeIs('profile.following', $username) ? 'bg-qaud-100 border-b-4 border-pri-100' : '' }}">
                <a href="{{ route('profile.following', $username) }}">Following</a>
            </div>
        </div>
        
        {{-- Followers --}}
        @if (request()->routeIs('profile.followers', $username))
            @if ($username == Auth::user()->username)
            
                @foreach ($user_following as $user_followerings)

                    <div class="flex hover:bg-qaud-100 duration-500 py-4 px-3">
                        <div>
                            <img class="w-20 object-cover rounded-full" src="{{ asset('/assets/images/'. $user_followerings->photo) }}" alt="">
                        </div>
                        <div class="w-full px-2 ">
                            <div class="font-bold">{{ $user_followerings->name }}</div>
                            <div class="text-zinc-500">{{ __('@') }}{{ $user_followerings->username }}</div>
                        </div>
                        <div>
                            <a href="#" class="border-[1px] border-zinc-300 rounded-full float-right px-5 py-1 font-bold my-2 mx-10 hover:text-red-500 hover:border-red-500" onmouseover="this.innerHTML = 'Unfollow'" onmouseout="this.innerHTML = 'Following'">Following</a>
                        </div>
                    </div>
                @endforeach

            @else
                @foreach ($visited_user_following as $visited_user_following)

                    <div class="flex hover:bg-qaud-100 duration-500 py-4 px-3">
                        <div>
                            <img class="w-20 object-cover rounded-full" src="{{ asset('/assets/images/'. $visited_user_following->photo) }}" alt="">
                        </div>
                        <div class="w-full px-2 ">
                            <div class="font-bold">{{ $visited_user_following->name }}</div>
                            <div class="text-zinc-500">{{ __('@') }}{{ $visited_user_following->username }}</div>
                        </div>
                        <div>
                            <a href="#" class="border-[1px] border-zinc-300 rounded-full float-right px-5 py-1 font-bold my-2 mx-10 hover:text-red-500 hover:border-red-500" onmouseover="this.innerHTML = 'Unfollow'" onmouseout="this.innerHTML = 'Following'">Following</a>
                        </div>
                    </div>
                @endforeach
            @endif

          
        {{-- Following --}}
        @elseif(request()->routeIs('profile.following', $username))
        
           
            @if ($username == Auth::user()->username)
            
                @foreach ($user_followers as $user_follower)
                    {{-- {{ $user_follower->name }}
                    {{ $user_follower->photo }} --}}

                    <div class="flex hover:bg-qaud-100 duration-500 py-4 px-3">
                        <div>
                            <img class="w-20 object-cover rounded-full" src="{{ asset('/assets/images/'. $user_follower->photo) }}" alt="">
                        </div>
                        <div class="w-full px-2 ">
                            {{-- <div class="font-bold">{{ $user_follower->name }}</div> --}}
                            <div class="font-bold text-md flex items-center">
                                <a class="hover:underline" href="{{ route('profile.index', $user_follower->username) }}">{{ $user_follower->name }}</a>
                                @if ($user_follower->blue_tick == 0)
                                    <ion-icon class="text-white rounded-full font-bold bg-pri-100" name="checkmark-circle-outline"></ion-icon>
                                @endif
                            </div>
                            <div class="text-zinc-500">{{ __('@') }}{{ $user_follower->username }}</div>
                        </div>
                        <div>
                            <a href="#" class="border-[1px] border-zinc-300 rounded-full float-right px-5 py-1 font-bold my-2 mx-10 hover:text-red-500 hover:border-red-500" onmouseover="this.innerHTML = 'Unfollow'" onmouseout="this.innerHTML = 'Following'">Following</a>
                        </div>
                    </div>
                @endforeach

            @else
                @foreach ($visited_user_followers as $visited_user_follower)
                    {{-- {{ $user_follower->name }}
                    {{ $user_follower->photo }} --}}

                    <div class="flex hover:bg-qaud-100 duration-500 py-4 px-3">
                        <div>
                            <img class="w-20 object-cover rounded-full" src="{{ asset('/assets/images/'. $visited_user_follower->photo) }}" alt="">
                        </div>
                        <div class="w-full px-2 ">
                            <div class="font-bold">{{ $visited_user_follower->name }}</div>
                            <div class="text-zinc-500">{{ __('@') }}{{ $visited_user_follower->username }}</div>
                        </div>
                        <div>
                            <a href="#" class="border-[1px] border-zinc-300 rounded-full float-right px-5 py-1 font-bold my-2 mx-10 hover:text-red-500 hover:border-red-500" onmouseover="this.innerHTML = 'Unfollow'" onmouseout="this.innerHTML = 'Following'">Following</a>
                        </div>
                    </div>
                @endforeach
            @endif
        
        @endif
    
    </div>



</x-app-layout>
