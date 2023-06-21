<div class="w-3/12 float-left sticky top-0">

    <div class="pl-28">
 
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
                    <div class="text-zinc-500"><span>@</span>{{ Auth::user()->username }}</div>
                </div>
            </div>

            <div>
                <ion-icon name="ellipsis-horizontal-outline"></ion-icon>
            </div>
        </div>

    </div>

</div>
<div class="w-3/12 float-right bg-yellow-300 sticky top-0">
    right
</div>

