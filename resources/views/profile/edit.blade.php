<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="max-w-screen-2xl m-auto px-20">
            
            <div class="bg-white py-2 shadow-sm">
                <div class="flex justify-center items-center">
                    <x-application-logo/><span class="font-bold text-pri-100 text-2xl">Twitter</span>
                </div>
            </div>
            <div class="w-[46%] m-auto border-[1px]">
                <div class="flex items-center space-x-3 py-1 px-5 sticky top-0 z-10 bg-white bg-opacity-30 backdrop-filter backdrop-blur-lg">
                    <a href="{{ url()->previous() }}"><ion-icon name="arrow-back-outline"></ion-icon></a>
                    <h1 class="font-bold text-xl p-4">{{ __('Edit Profile') }}</h1>
                </div>
               
                <form class="" action="" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="h-72">
                        <div class="relative h-[75%] bg-slate-300">
                            <img class="absolute -bottom-14 left-10 h-28 rounded-full" src="{{ asset('/assets/images/'. Auth::user()->photo) }}" alt="">
                        </div>
                    </div>

                    <div class="px-5 py-2">
                        <label for="">Name</label>
                        <input class="w-full rounded-md focus:border-blue-300" type="text" value="{{ $user->name }}">
                    </div>

                    <div class="px-5 py-2">
                        <label for="">Username</label>
                        <input class="w-full rounded-md focus:border-blue-300" type="text" value="{{ $user->username }}">
                    </div>

                    <div class="px-5 py-2">
                        <label for="">Email</label>
                        <input class="w-full rounded-md focus:border-blue-300" type="text" value="{{ $user->email }}">
                    </div>

                    <input class="bg-black text-white px-5 py-1 rounded-md inline-block my-8 mx-4" type="submit" value="Save">
                
                </form>
                
                 
            </div>
            
        </div>

        {{-- script for logo --}}
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
