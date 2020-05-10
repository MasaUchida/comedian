<!--set query1-->
@php
    $args = array(
        'post_type' => 'comedian',
        'posts_per_page' => 4,
        );
    $query = new WP_Query($args);
@endphp

<!--query1 loop-->
@if($query -> have_posts()) 
    @while($query -> have_posts())
        {{$query -> the_post()}}
            <div class="p-comedian__card-container">
                <article class="c-card p-comedian__card">  
                    <a href="{{the_permalink()}}"> 
                        <div style="background-image: url({{the_post_thumbnail_url()}})" class="c-card__image"></div>
                        <div class="p-comedian__text">
                            <h3 class="p-comedian__title">{{the_title()}}</h3>
                            <p class="p-comedian__date">{{get_the_date()}}</p>
                        </div>
                    </a>
                </article>
            </div>
    @endwhile
    {{wp_reset_postdata()}}
@endif