<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>User Page</title>
</head>
<body>
    @include('layouts.menu')
    <div class="container">@yield('userpage')</div>
</body>
</html>