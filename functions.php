<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Jenssegers\Blade\Blade;

/**
 * Blade template rendering
 */
if (!function_exists('render_blade')) {
    function render_blade($template_name)
    {
        $blade = new Blade(__DIR__ . '/views', __DIR__ . '/cache');

        return $blade->make($template_name);
    }
}

/**
 * support thumbnail img
 */

add_theme_support( 'post-thumbnails' );


/**
 * remove unuse function
 */

function remove_menus(){
  
  remove_menu_page( 'index.php' );                  // ダッシュボード
  remove_menu_page( 'edit.php' );                   // 投稿
  remove_menu_page( 'edit-comments.php' );          // コメント

}

add_action( 'admin_menu', 'remove_menus' );

/**
 * create custom edit
 */


function create_post_type(){

    /**
     * register 'comedian' post
     */

    //supportArray
    $comedian_support = array(
        'title',
        'editor',
        'thumbnail',
        'custom-fields',
        'excerpt'
    );

    //labelArray
    $comedian_labels = array(
        'menu_name' => '芸人一覧',
		'add_new_item'  => '新規芸人登録', //新規作成ページのヘッダに表示されるテキスト
		'add_new'       => '新規芸人登録', //メニューの新規追加のラベル
		'edit_item'     => '編集', //編集ページのタイトルに表示される名前
        'view_item'     => '編集', //編集ページの「投稿を表示」ボタンのラベル
        'search_items'  => '芸人名の検索', //一覧ページの検索ボタンのラベル
        'not_found'     => '見つかりません。', //一覧ページに投稿が見つからなかったときに表示
        'not_found_in_trash' => 'ゴミ箱にはありません。' //ゴミ箱に何も入っていないときに表示
    );

    //register_post_type
    register_post_type( 'comedian',
        array(
        'labels' => $comedian_labels,
        'description' => '芸人を登録してください',
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'supports' => $comedian_support,
        'menu_icon' => 'dashicons-admin-users',
        )
    );

    /**
     * register 'criticism' post
     */

    //supportArray
    $criticism_support = array(
        'title',
        'editor',
        'thumbnail',
        'custom-fields',
        'excerpt'
    );

    //labelArray
    $criticism_labels = array(
        'menu_name' => '批評記事',
		'add_new_item'  => '批評記事', //新規作成ページのヘッダに表示されるテキスト
		'add_new'       => '新規批評記事', //メニューの新規追加のラベル
		'edit_item'     => '編集', //編集ページのタイトルに表示される名前
        'view_item'     => '編集', //編集ページの「投稿を表示」ボタンのラベル
        'search_items'  => '記事の検索', //一覧ページの検索ボタンのラベル
        'not_found'     => 'まだ記事は投稿されていません', //一覧ページに投稿が見つからなかったときに表示
        'not_found_in_trash' => 'ゴミ箱に記事はありません。' //ゴミ箱に何も入っていないときに表示
    );

    register_post_type( 'criticism',
    array(
    'labels' => $criticism_labels,
    'description' => '記事を登録してください',
    'public' => true,
    'has_archive' => true,
    'menu_position' => 5,
    'supports' => $criticism_support,
    'menu_icon' => 'dashicons-admin-users',
    )


);
}


add_action('init', 'create_post_type' );

/**
 * register-taxonomy
 */

function create_taxonomy(){

    $labels = array(
		'name'              => _x( '芸人名登録', 'taxonomy general name' ),
		'singular_name'     => _x( '芸人名登録', 'taxonomy singular name' ),
		'search_items'      => __( '芸人検索' ),
		'all_items'         => __( 'All Genres' ),
		'parent_item'       => __( '親グループ' ),
		'parent_item_colon' => __( '親グループ:' ),
		'edit_item'         => __( '芸人タグ編集' ),
		'update_item'       => __( '更新' ),
		'add_new_item'      => __( '新規芸人登録' ),
		'new_item_name'     => __( 'New Genre Name' ),
		'menu_name'         => __( '芸人名登録' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'comedian' ),
	);

	register_taxonomy( 'comedian-name', array('comedian','criticism'), $args );

}

add_action('init', 'create_taxonomy' );

/**
 * register-menu
 */

add_action('after_setup_theme','register_my_menu');

function register_my_menu(){
    register_nav_menu( 'primary', ( 'メニューヘッダ' ) );
}


/**
 * add-sidebar
 */

add_action( 'widgets_init', 'create_sidebar' );

function create_sidebar() {
    register_sidebar( array(
        'name' => ( 'main-sidebar'),
        'id' => 'main-sidebar',
        'description' => ( 'メインサイドバー'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name' => ( 'single-sidebar'),
        'id' => 'single-sidebar',
        'description' => ( 'シングルサイドバー'),
        'class' => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}

/**
 * add style sheets
 */

add_action('wp_enqueue_scripts', 'enqueue_stylesheets' );

function enqueue_stylesheets(){
    wp_enqueue_style(
        'reset',
        get_template_directory_uri() . '/reset.css'
    );
    wp_enqueue_style(
        'main',
        get_template_directory_uri() . '/style.css'
    );
}