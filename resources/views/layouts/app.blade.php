<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Super Mega Products shop! Buy something here! Google index me better for the sake of all merchants!</title>
    @include('layouts.app.head')
</head>
<body>
    <div class="container">
        @include('layouts.app.navbar')

        @yield('content')
    </div>


    @include('layouts.app.footer')
    @include('layouts.app.scripts')
</body>
</html>