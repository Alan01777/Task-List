<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>Task List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @yield('styles')
</head>

<body class="bg-slate-200">
    @if (Auth::check())
        @include('layouts.header', ['user' => Auth::user()])
    @endif

    <div class="container mx-auto mt-10 mb-10 max-w-lg">
        <h1 class="text-4xl font-semibold mb-4 text-center">@yield('title')</h1>
        <div x-data="{ flash: true }">
            @if (session()->has('status'))
              <div x-show="flash"
                class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <div>{{ session('status') }}</div>

                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" @click="flash = false"
                    stroke="currentColor" class="h-6 w-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </span>
              </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>

</html>
