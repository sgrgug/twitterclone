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
                bye
            @endif

        </div>

        @if (Auth::user()->username == $username)
            <div class="px-2">
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
        @else
            <div class="px-2">
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
        @endif
    
    </div>


</x-app-layout>
