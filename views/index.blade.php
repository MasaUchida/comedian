@extends('layout')

@section('content')
    <div class="container">
        <ul>
            @if (have_posts())
                @while (have_posts())
                    {{the_post()}}
                    <div class="{{the_ID()}}">
                        <a href="{{ the_permalink() }}">{{ the_post_thumbnail() }}
                            <h3>{{the_title()}}</h3>
                            <p>{{the_content()}}</p>
                        </a>
                    </div>
                @endwhile
            @endif
        </ul>
    </div>
@endsection