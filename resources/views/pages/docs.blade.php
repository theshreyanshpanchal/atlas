@extends('atlas::layouts.app')

@section('content')

<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 relative flex items-center justify-center min-h-screen">

    <div class="absolute left-0 top-0 w-[50%] pr-4">

        <img class="w-full h-auto" src="{{ asset('atlas/svgs/map.svg') }}" />

        <div class="absolute bottom-0 left-0 text-center w-full text-7xl font-bold text-[#EA462F]">{{ __('Atlas') }}</div>

    </div>

    <div class="absolute bg-gray-50 text-black/50 dark:bg-white/80 dark:text-white p-8 rounded-lg shadow-lg" style="width: calc(50%); height: calc(80%); top: 50%; transform: translateY(-50%); right: 10%;">

        <div class="overflow-auto h-full">

            <h1 class="text-3xl font-bold mb-4 text-[#EA462F]">{{ __('Documentation') }}</h1>

            <div class="prose prose-lg">{!! $content !!}</div>

        </div>

    </div>

</div>

@endsection
