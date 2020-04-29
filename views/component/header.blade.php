@php
//メニュー設定
$defaults = array(
  'menu_class'      => 'header--lists',//ulへのclass名
  'menu_id'         => 'header--id',//ulへのid名
  'container'       => 'div',//ul内のタグ
  'container_class' => 'header--container',//コンテナのクラス
  'container_id'    => '',
  'fallback_cb'     => 'wp_page_menu',//メニューがないときのコールバック関数
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'echo'            => true,
  'depth'           => 1,
  'walker'          => '',
  'theme_location'  => 'primary',//ここをfunctionのregister_nav_menuで宣言したものと一致させる
  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
);
@endphp

<header>
    <nav class="cf">

      {{wp_nav_menu( $defaults )}}
      
    </nav>
</header>
  
