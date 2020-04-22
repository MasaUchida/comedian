<!DOCTYPE html>
<html lang="ja">
<head>
    @include('innerhead')
</head>
<body>
    @include('header')
    <main>
        @if(is_home())
            @yield('index')
        @elseif(is_singular('comedian'))
            @yield('comedian')
        @elseif(is_singular('criticism'))
            @yield('criticism')
        @else
            <p>エラー</p>
        @endif
    </main>    
    @include('footer')
</body>
</html>