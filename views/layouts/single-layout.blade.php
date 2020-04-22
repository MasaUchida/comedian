@extends('layouts.layout')

@section(@yield('single'))

    @if(have_posts())
        @while(have_posts())
            {{the_post()}}

                @yield('single-content')

        @endwhile
    @endif

    <ul>
        @include('sidebar')
    </ul>
    
@endsection