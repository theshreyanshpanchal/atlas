@extends('atlas::layouts.app')

@section('content')

    <div class="bg-gray-50 dark:bg-black h-screen flex flex-col justify-center items-center text-black/50 dark:text-white/50">

        <img id="background" class="absolute -left-20 top-0 max-w-full" src="{{ asset('svgs/splash.svg') }}" />

        <div class="relative flex flex-col items-center justify-center w-full max-w-2xl px-6 lg:max-w-7xl">

            <div class="grid-cols-1 sm:grid-cols-2 items-center gap-2 py-4">

                <div class="flex justify-center lg:col-start-2 gap-4">

                    <img src="{{ asset('svgs/laravel.svg') }}" alt="Laravel" class="h-18">

                    <img src="{{ asset('svgs/plus.svg') }}" alt="Plus" class="h-18">

                    <img src="{{ asset('svgs/atlas.svg') }}" alt="Atlas" class="h-18">

                </div>

            </div>

            <main class="mt-2">

                <div class="grid grid-cols-1">

                    <div class="flex justify-center items-center">

                        <h1 class="text-3xl lg:text-5xl text-red-600 font-extrabold text-center leading-tight">

                            {{ __('Atlas') }}

                        </h1>

                    </div>

                    <p class="text-center mt-4 lg:text-lg"> {{ __('Laravel package providing comprehensive global data for your next project.') }} </p>

                </div>

            </main>

            <footer class="py-8 text-center text-sm text-black dark:text-white/70">

                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})

            </footer>

        </div>

    </div>

@endsection
