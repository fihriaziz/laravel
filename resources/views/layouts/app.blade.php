<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    {{-- Style --}}
    @include('includes.style')
  </head>
  <body>
    @include('includes.navbar')

    <main>
        @yield('content')
    </main>

    {{-- Script --}}
    @include('includes.script')
  </body>
</html>
