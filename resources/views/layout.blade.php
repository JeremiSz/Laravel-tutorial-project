<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Jeremi Sz's Blog</title>
        
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="/temp.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        @yield('content')
    </body>
    @if (session()->has('success'))
    <p class="other-side">
        {{ session('success') }}
    </p>
    @endif
    <footer>
        <p class="other-side">Jeremi Sz's Blog &copy; 2023</p>
</html>