<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ bloginfo('name') }}</title>
    {{wp_head()}}
</head>
<body>
    @include('component.header')
    <main>
        @yield('index')
    </main>    
    @include('component.footer')
</body>
</html>