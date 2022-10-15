<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - CRUD Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    @stack('css')
</head>
<body>
    <div class="container mt-2">
        @yield('content')
    </div>
    @stack('js')
</body>
</html>
