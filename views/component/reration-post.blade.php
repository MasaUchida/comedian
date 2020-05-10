{{--valiables init--}}
@php
    global $post; 
    $term_name = '';
    $ttaxonomy_name = '';
    $success_flag = false;
    $query = null;
@endphp

{{--get terms--}}
@php
    $terms = get_the_terms($post->ID, 'comedian-name');
@endphp

{{--set names for query--}}
@if($terms)
    @php
        $term_name = $terms[0]->name;
        $taxonomy_name = $terms[0]->taxonomy;
        $success_flag = true;
    @endphp
@endif

{{--set query--}}
@if ($success_flag)
    @php
        $args = array(
        'post_type' => array('comedian','criticism'),
        'posts_per_page' => 4,
        'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy_name,
                    'terms' => $term_name,
                    'field'    => 'slug',
                    'include_children' => true,  
                ),
            ),
        );
        $query = new WP_Query($args);
        var_dump($query);
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