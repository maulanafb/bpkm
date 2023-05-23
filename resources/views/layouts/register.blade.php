<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
    {{-- style  --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>
<body>
  <div class="container-scroller">
    {{-- navbar --}}
    @include('includes.navbar-register')
    {{-- page content  --}}
    @yield('content')
  </div>

  {{-- script  --}}
  @stack('prepend-script')
  @include('includes.script')
  @stack('addon-script')
</body>

</html>

