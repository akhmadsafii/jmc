<!DOCTYPE html>
<html>

<head>
    @include('layout.head')
    @stack('styles')
</head>

<body>

    @include('layout.menu')

    <div class="container my-5">
        @yield('content')
    </div>

    @include('layout.foot')
    @stack('scripts')
</body>

</html>
