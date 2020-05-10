@php
//メニュー設定
$defaults = array(
  'menu_class'      => 'l-header__container',//ulへのclass名
  'menu_id'         => '',//ulへのid名
  'container'       => '',//ul内のタグ
  'container_class' => '',//コンテナのクラス
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

<header class="l-header">
  <a href="http://localhost:8888/experiment/" class="l-header__image">
    <div>HOME</div>
  </a>
      {{wp_nav_menu( $defaults )}}
      
</header>
  
