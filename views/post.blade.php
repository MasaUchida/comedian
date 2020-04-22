<!--set query2-->
@php
    $query2 = new WP_Query( array('post_type' => 'criticism') );
@endphp

<!--query2 ioop-->
@if($query2 -> have_posts()) 
    @while($query2 -> have_posts())
        {{$query2 -> the_post()}}

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