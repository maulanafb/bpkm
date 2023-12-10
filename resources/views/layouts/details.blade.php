<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    {{-- style  --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>

<body>
    <div class="container-scroller ">
        {{-- navbar --}}
        @include('includes.navbar')
        {{-- page content  --}}
        @yield('content')
    </div>

    {{-- script  --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')


    {{-- resources/views/layouts/app.blade.php --}}

    <script>
        var currentUrl = "{{ url()->current() }}";

        function addActiveClass(element) {
            var href = element.attr('href');

            // Check if the current URL is the home page
            if (currentUrl !== "{{ route('home') }}") {
                if (currentUrl === "" && href === "{{ url('/') }}") {
                    setActive(element);
                } else if (currentUrl !== "" && href.indexOf(currentUrl) !== -1) {
                    setActive(element);
                }
            } else {
                // Jika berada di route home, hanya set aktif untuk menu "Home"
                if (href === "{{ route('home') }}") {
                    setActive(element);
                }
            }
        }

        function setActive(element) {
            element.parents('.nav-item').last().addClass('active');

            if (element.parents('.sub-menu').length) {
                element.closest('.collapse').addClass('show');
            }

            element.addClass('active');
        }

        // Laravel Blade loop for sidebar
        $('.nav li a').each(function() {
            var $this = $(this);
            addActiveClass($this);
        });

        // Laravel Blade loop for horizontal menu
        $('.horizontal-menu .nav li a').each(function() {
            var $this = $(this);
            addActiveClass($this);
        });

        // Close other submenu in the sidebar on opening any
        $('.sidebar').on('show.bs.collapse', '.collapse', function() {
            $('.sidebar').find('.collapse.show').collapse('hide');
        });
    </script>
</body>

</html>
