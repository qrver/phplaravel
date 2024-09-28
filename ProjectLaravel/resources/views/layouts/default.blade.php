<!DOCTYPE html>
<html lang="ru">
<head>
    @include('includes.head')
</head>
<body>
    @include('includes.header')

    <div class="content">
        @yield('content')
    </div>

    @include('includes.footer')
</body>
</html>
