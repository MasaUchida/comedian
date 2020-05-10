{{--
*
*This file is echo reration-post for single page
*
--}}

{{--variables init--}}
@php
    global $post; 
    $this_post_ID = $post->ID;

    //query variables
    $target_post_type = array('comedian','criticism');
    $page_num = 4;
    $query = null;

    //tax variables
    $taxonomy_name = 'comedian-name';
    $this_post_terms = get_the_terms($this_post_ID, $taxonomy_name);//記事の付随情報取得
    $term_name_array = array();

    //loop variables
    $loop_counter = 0;
@endphp

{{--make array of this post terms--}}
@if($this_post_terms)
    @php
        for ($i=0; $i < count($this_post_terms); $i++) { //付随カテゴリの配列作成
            $term_name_array[$i] = $this_post_terms[$i]->name;
        }
    @endphp
@endif

{{--set query--}}
@if (!empty($term_name_array))
    @php
        $args = array(
        'post_type' => $target_post_type,
        'posts_per_page' => $page_num,
        'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy_name,
                    'terms' => $term_name_array,
                    'field'    => 'slug',
                    'include_children' => true,  
                ),
            ),
        'post__not_in' => array($this_post_ID),
        );
        $query = new WP_Query($args);
    @endphp
@endif

{{--main loop--}}
<div class="p-rerationpost__container">
    @if ($query != null)
        @if ($query -> have_posts())
            @while($query -> have_posts())
                {{$query -> the_post()}}
                        <div class="c-card p-rerationpost__card">
                            <div class="c-card__image" style="background-image:url({{the_post_thumbnail_url()}}) ;"></div>
                            <section class="c-card__text">
                                <h4>{{the_title()}}</h4>
                                <p>{{get_the_content()}}</p>
                            </section>
                        </div>
            @endwhile
        {{wp_reset_postdata()}}
        @endif
    @else
        <h2>関連記事はありません</h2>
    @endif
</div>