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
                    <h1 class="font-bold text-xl p-4">{{ __('Settings') }}</h1>
                </div>
                
                
                <div>
                    <h1 class="px-4 font-bold">{{ __('Your Account >') }}</h1>
                    <div class="px-16 py-2 hover:bg-qaud-100">
                        <a href="{{ route('edit_profile') }}">
                            <ion-icon class="pr-3" name="person-outline"></ion-icon>
                            <span>{{ __('Change Account') }}</span>
                        </a>
                    </div>
                    <div class="px-16 py-2 hover:bg-qaud-100">
                        <a href="#">
                            <ion-icon class="pr-3" name="key-outline"></ion-icon>
                            <span>{{ __('Change Password') }}</span>
                        </a>
                    </div>
                    <div class="px-16 py-2 hover:bg-qaud-100">
                        <a href="#">
                            <ion-icon class="pr-3" name="trash-outline"></ion-icon>
                            <span>{{ __('Delete Account') }}</span>
                        </a>
                    </div>
                </div>

                <div>
                    <h1 class="px-4 font-bold">{{ __('Twitter Blue >') }}</h1>
                    <div class="px-16 py-2 hover:bg-qaud-100">
                        <a href="#">
                            <ion-icon class="pr-3" name="card-outline"></ion-icon>
                            <span>{{ __('Purchase Blue') }}</span>
                        </a>
                    </div>
                </div>
                
            </div>
            
        </div>

        {{-- script for logo --}}
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
