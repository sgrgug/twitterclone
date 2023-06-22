{{-- Left Section --}}
<div class="w-3/12 float-left sticky top-0">

    <div class="pl-5">
 
        <div class="py-1">
            <a class="inline-block hover:bg-qaud-100 rounded-full text-2xl py-2 px-5" href="#">
                <img class="h-10" src="{{ asset('assets/images/logo-twitter.png') }}" alt="">
            </a>
        </div>
        
        <div class="py-1">
            <a class="inline-block hover:bg-qaud-100 rounded-full text-2xl py-2 px-5" href="#">
                <ion-icon class="pr-3" name="home-outline"></ion-icon>
                Home
            </a>
        </div>

        <div class="py-1">
            <a class="inline-block hover:bg-qaud-100 rounded-full text-2xl py-2 px-5" href="#">
                <ion-icon class="pr-3" name="search-outline"></ion-icon>
                Explore
            </a>
        </div>

        <div class="py-1">
            <a class="inline-block hover:bg-qaud-100 rounded-full text-2xl py-2 px-5" href="#">
                <ion-icon class="pr-3" name="checkmark-circle-outline"></ion-icon>
                Verified
            </a>
        </div>

        <div class="py-1">
            <a class="inline-block hover:bg-qaud-100 rounded-full text-2xl py-2 px-5" href="#">
                <ion-icon class="pr-3" name="person-outline"></ion-icon>
                Profile
            </a>
        </div>

        <div class="py-1 px-3">
            <a class="inline-block bg-pri-100 hover:bg-sec-100 rounded-full text-xl text-white py-3 w-full text-center" href="#">
                Tweet
            </a>
        </div>

        <div class="flex justify-between items-center py-2 px-4 cursor-pointer hover:bg-qaud-100 rounded-full">
            <div class="flex justify-center items-center">
                <div class="bg-slate-300 rounded-full">
                    <img class="h-12 rounded-full" src="{{ asset('/assets/images/'. Auth::user()->photo) }}" alt="">
                </div>
                <div class="px-2">
                    <div>{{ Auth::user()->name }}</div>
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
            </div>

            <div>
                <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
            </div>
        </div>

    </div>

</div>

{{-- Right Section --}}
<div class="w-[27%] float-right sticky top-0 p-4">
    <div class="flex items-center bg-qaud-100 rounded-full px-4 py-1">
        <div class="flex justify-center items-center">
            <ion-icon class="text-2xl text-slate-500" name="search-outline"></ion-icon>
        </div>
        <div>
            <form action="{{ route('home') }}" method="get">
                @csrf
                <input class="bg-qaud-100 border-0 focus:ring-transparent text-base w-full" placeholder="Twiiter Search" type="text" name="" id="">
            </form>
        </div>
    </div>

    {{-- Recommanded if user get blue tick or not --}}
    @if(Auth::user()->blue_tick == 1)
        <div class="my-4 bg-qaud-100 rounded-3xl p-3">
            <h1 class="font-extrabold text-2xl">Get Verified</h1>
            <h3 class="text-black font-extrabold">Subscribe to unlock new features.</h3>
            <a class="inline-block bg-black rounded-full px-4 py-2 my-2 text-lg font-bold text-white" href="">Get Verified</a>
        </div>
    @endif

    {{-- Treding Topic --}}
    {{-- <div class="my-4 bg-qaud-100 rounded-3xl p-3">
        <h1 class="font-extrabold text-2xl">Get Verified</h1>
    </div> --}}


    @php

        $random_ids = App\Models\User::pluck('id')->random(3);

        $users = App\Models\User::whereIn('id', $random_ids)->get();
  
    @endphp

    {{-- Who to follow --}}
    <div class="my-4 bg-qaud-100 rounded-3xl p-3">
        <h1 class="font-extrabold text-2xl">Who to follow</h1>
        @foreach ($users as $user)
        <div class="flex justify-between items-center my-5">
            <div class="flex items-center">
                <div>
                    <img class="h-12 rounded-full" src="{{ asset('/assets/images/'. $user->photo) }}" alt="">
                </div>
                <div class="px-2">

                        

                    <div class="font-bold text-md flex">
                        <a class="hover:underline" href="#">{{ $user->name  }}</a>
                        @if ($user->blue_tick == 0)
                            <ion-icon class="text-white rounded-full font-bold bg-pri-100" name="checkmark-circle-outline"></ion-icon>
                        @endif
                    </div>
                    <div><span class="text-zinc-500">@</span><span class="text-zinc-500">{{ $user->username  }}</span></div>
                </div>
            </div>
            <div>
                <a class="inline-block bg-black rounded-full px-3 py-1 my-1 text-sm font-bold text-white" href="">Follow</a>
            </div>
        </div>
        @endforeach
    </div>
    

    <div class="flex flex-wrap px-4 text-sm space-x-3 p-3">
        <a class="text-zinc-500 hover:underline" href="#">Terms of Service</a>
        <a class="text-zinc-500 hover:underline" href="#">Privacy Policy</a>
        <a class="text-zinc-500 hover:underline" href="#">Cookie Policy</a>
        <a class="text-zinc-500 hover:underline" href="#">Accessibility</a>
        <a class="text-zinc-500 hover:underline" href="#">Ads Info</a>
        <a class="text-zinc-500 hover:underline" href="#">More...</a>
        <a class="text-zinc-500 hover:underline" href="#">@2023 X Corp.</a>
    </div>

</div>

