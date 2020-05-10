{{--set query--}}
@php
    $args = array(
        'post_type' => 'criticism',
        'posts_per_page' => 10,
        );
    $query = new WP_Query($args);
@endphp

{{--query loop--}}
@if($query -> have_posts()) 
    @while($query -> have_posts())
        {{$query -> the_post()}}
            <div class="p-criticism__post-container">   
                <a href="{{the_permalink()}}">
                    <article class="p-criticism__post">
                        <figure class="p-criticism__iamge-container">
                            <img class="p-criticism__iamge" src="{{get_the_post_thumbnail_url()}}"/>
                        </figure>
                        <div class="p-criticism__text-container">
                            <h2 class="p-criticism__title">{{the_title()}}</h2>
                            <p class="p-criticism__text">{{the_content()}}</p>
                            <p class="p-criticism__date">{{get_the_date()}}</p>
                        </div>
                    </article>
                </a>
            </div>
    @endwhile
    {{wp_reset_postdata()}}
@endif