@extends('layouts.layout')

@section('index')
    @if(is_post_type_archive('comedian'))
        @php $query = get_query_for_archive('comedian',3) @endphp
    @elseif(is_post_type_archive('criticism'))
        @php $query = get_query_for_archive('criticism',2) @endphp
    @endif

    <div class="p-archive__main">
        @if(is_post_type_archive('comedian'))
            <h1>芸人一覧</h1>
        @elseif(is_post_type_archive('criticism'))
            <h1>投稿一覧</h1>
        @endif
        <div class="p-archive__wrapper"> 
            @if($query->have_posts())
                @while($query->have_posts())
                    {{$query->the_post()}}
                        <div class="p-archive__card-container">
                            <a href="{{get_permalink()}}" class="c-card p-archive__card">
                                <div class="c-card__image p-archive__image" style="background-image: url({{the_post_thumbnail_url()}});"></div>
                                <section class="p-archive__contents"> 
                                    <div class="c-card__text">
                                        <h3 class="p-archive__title">{{the_title()}}</h3>
                                        <p class="p-archive__date">{{get_the_date()}}</p>
                                    </div>          
                                </section>
                            </a>
                        </div>
                @endwhile
            @endif
            @php
                pagination($query->max_num_pages,get_query_var('paged'));
                wp_reset_postdata();
            @endphp
        </div>
    </div>
@endsection