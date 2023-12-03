<?php

add_action( 'after_setup_theme', function () {
	register_nav_menus( [
		'primary'   => 'Main header menu',
		'primary_mz'   => 'Main header menu mz',
		'primary_br'   => 'Main header menu br',
		'secondary' => 'Secondary header menu',
		'footer_menu_mz' => 'Footer menu mz',
		'footer_menu_br' => 'Footer menu br'
	] );
} );

add_action( 'widgets_init', function () {
	register_sidebars( 4, [
		'name'          => 'Колонка в футере %d',
		'id'            => 'footer-menu',
		'before_title'  => '<span class="footer-column__title">',
		'after_title'   => '</span>',
		'before_widget' => '<nav id="%1$s" class="page-footer__item footer-column %2$s">',
		'after_widget'  => '</nav>'
	] );
} );
function register_my_widgets() {
	register_sidebar( array(
		'name'          => "Виджет для флажков языков",
		'id'            => 'language-flags',
		'before_widget' => '<div class="flags-widget">',
		'after_widget'  => '</div>',
	) );
}

add_action( 'widgets_init', 'register_my_widgets' );

add_action( 'widgets_init', function () {
	register_sidebars( 1, [
		'name'          => 'Виджет br версии',
		'id'            => 'footer-menu-br',
		'before_title'  => '<span class="footer-column__title">',
		'after_title'   => '</span>',
		'before_widget' => '<nav id="%1$s" class="page-footer__item footer-column %2$s">',
		'after_widget'  => '</nav>'
	] );
} );
