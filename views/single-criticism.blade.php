@extends('layouts.layout')

@section('criticism')

    @if(have_posts())
        @while(have_posts())
            {{the_post()}}
                <img src="{{the_post_thumbnail_url()}}" alt="">
                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                <h2>{{the_title()}}</h2>
                <p>{{get_the_content()}}</p>
        @endwhile
    @endif

    <ul>
        @include('sidebar')
    </ul>
    
@endsection

