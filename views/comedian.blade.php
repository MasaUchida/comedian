<!--set query1-->
@php
    $query1 = new WP_Query( array('post_type' => 'comedian') );
@endphp

<!--query1 loop-->

@if($query1 -> have_posts()) 
    @while($query1 -> have_posts())
        {{$query1 -> the_post()}}

            <article class="comedian">  
                <a href="{{the_permalink()}}"> 
                <img src="{{the_post_thumbnail_url()}}" alt="">
                <h2>{{the_title()}}</h2>
                <p>{{the_content()}}</p>
            </a>
            </article>

    @endwhile
    {{wp_reset_postdata()}}
@endif
