{{--set query--}}
@php
    $query = new WP_Query( array('post_type' => 'criticism') );
@endphp

{{--query loop--}}
@if($query -> have_posts()) 
    @while($query -> have_posts())
        {{$query -> the_post()}}

            <a href="{{the_permalink()}}">
                <article class="post">
                    <div class="column-img">
                    <img src="{{the_post_thumbnail_url()}}" alt="">
                    </div>
                    <div class="column-text">
                    <h2>{{the_title()}}</h2>
                    <p>{{the_content()}}</p>
                    </div>
                </article>
            </a>
            
    @endwhile
    {{wp_reset_postdata()}}
@endif