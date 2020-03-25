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


add_theme_support( 'post-thumbnails' );


/**
 * create custom edit
 */


function create_post_type(){

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

    //register_taxonomy - tag
}

add_action('init', 'create_post_type' );


/**
 * register-menu
 */

add_action('after_setup_theme','register_my_menu');

function register_my_menu(){
    register_nav_menu( 'primary', ( 'メニューヘッダ' ) );
}