<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>User Page</title>
</head>
<body>
    <x-header/>
    @if(Request::url() === 'http://0.0.0.0/index/userpage')
        <x-userpage/>
    @elseif(Request::url() === "http://0.0.0.0/index")
        <x-index/>
    @endif
    
</body>
</html>