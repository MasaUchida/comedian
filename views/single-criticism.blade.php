@extends('layouts.layout')

@section('index')
<div class="p-single__backImage"></div>
    <div class="p-single__main">
        @if(have_posts())
            @while(have_posts())
                {{the_post()}}
                    <div class="p-single__image" style="background-image: url({{the_post_thumbnail_url()}});"></div>
                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    <section class="p-single__contents"> 
                        <div class="p-single__document">
                            <h2>{{the_title()}}</h2>
                            <p>{{get_the_content()}}</p>
                        </div>          
                        <div class="p-single__sidebar">
                        @include('component.sidebar')
                        </div>
                    </section>
                    <h2>????</h2>
                        @include('component.reration-post')
            @endwhile
        @endif
    </div>
@endsection