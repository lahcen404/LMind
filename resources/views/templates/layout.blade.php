<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMind - @yield('title')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900">

@include('templates.header')
@yield('content')
@include('templates.footer')

</body>
</html>