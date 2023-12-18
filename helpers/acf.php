<?php

function acf_block_before( $block_name, $is_preview ) {
	if ( $is_preview ) {
		echo "<div class='preview-block'>
        <div class='preview-block__title'>$block_name</div>
        <div class='preview-block__content'>";
	}
}

function acf_block_after( $is_preview ) {
	if ( $is_preview ) {
		echo "</div></div>";
	}
}

function acf_create_block( $block_name, $block_title, $render_template, $jsx = false ) {
	acf_register_block_type( [
		'name'            => $block_name,
		'title'           => __( $block_title ),
		'render_template' => 'partials/acf-blocks/' . $render_template . '.php',
		'supports'        => [
			'jsx' => $jsx
		]
	] );
}

// Add styles for gutenberg
add_action( 'after_setup_theme', function () {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style-editor.css' );
	add_editor_style( '/dist/css/app.css' );
	add_editor_style( '/dist/css/critical.css' );
	add_theme_support('align-wide');

	add_theme_support("editor-color-palette", array(
		[
			'name' => esc_attr__('strong magenta', 'themeLangDomain'),
			'slug' => 'strong-magenta',
			'color' => '#a156b4',
		],
		[
			'name' => esc_attr__('very light gray', 'themeLangDomain'),
			'slug' => 'very-light-gray',
			'color' => '#eee',
		]
		)
	);
	add_theme_support("disable-custom-colors");
	add_theme_support('editor-gradient-presets', array(
			[
				'name' => esc_attr__('Red to Blue', 'themeLangDomain'),
				'gradient' => 'linear-gradient(135deg, #e4064d 0%, #2c59ee 100%)',
				'slug' => 'red-to-blue'
			],
			[
				'name' => esc_attr__('Green to Yellow', 'themeLangDomain'),
				'gradient' => 'linear-gradient(135deg, #3ce406 0%, #d6e029 100%)',
				'slug' => 'green-to-yellow'
			]
		)
	);
	add_theme_support("disable-custom-gradient");

	add_theme_support('editor-font-sizes', array(
		[
			'name' => esc_attr__('Small', 'themeLangDomain'),
			'size' => 12,
			'slug' => 'small'
		],
		[
			'name' => esc_attr__('Regular', 'themeLangDomain'),
			'size' => 16,
			'slug' => 'regular'
		],
		[
			'name' => esc_attr__('Large', 'themeLangDomain'),
			'size' => 36,
			'slug' => 'large'
		],
	));
	add_theme_support("disable-custom-font-sizes");
	add_theme_support("custom-line-height");
	add_theme_support('custom-spacing');
} );
function my_acf_admin_head() {
	app_get_partial( 'shared/root-styles' );
}

add_action( 'current_screen', 'styles_for_editor' );
function styles_for_editor() {
	$screen = get_current_screen();
	if ( $screen->post_type === 'page' || ( $screen->post_type === 'post' && $screen->is_block_editor ) ) {
		add_action( 'acf/input/admin_head', 'my_acf_admin_head' );
	}
}

function acf_filter_rest_api_preload_paths( $preload_paths ) {
	global $post;
	$rest_path    = rest_get_route_for_post( $post );
	$remove_paths = array(
		add_query_arg( 'context', 'edit', $rest_path ),
		sprintf( '%s/autosaves?context=edit', $rest_path ),
	);

	return array_filter(
		$preload_paths,
		function ( $url ) use ( $remove_paths ) {
			return ! in_array( $url, $remove_paths, true );
		}
	);
}

add_filter( 'block_editor_rest_api_preload_paths', 'acf_filter_rest_api_preload_paths', 10, 1 );

// Add gutenberg blocks
add_action( 'acf/init', function () {

	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( [
			'page_title' => 'Настройки',
			'menu_title' => 'Настройки',
			'slug'       => 'advanced-options',
			'autoload'   => true,
			'icon_url'   => 'dashicons-hammer',
		] );

		acf_add_options_page( [
			'page_title'  => 'Настройки сайта',
			'menu_title'  => 'Настройки сайта',
			'parent_slug' => 'advanced-options',
			'slug'        => 'site-settings',
			'autoload'    => true,
			'icon_url'    => 'dashicons-hammer',
		] );

		acf_add_options_page( [
			'page_title'  => 'Настройки темы',
			'menu_title'  => 'Настройки темы',
			'parent_slug' => 'advanced-options',
			'slug'        => 'theme-settings',
			'autoload'    => true,
			'icon_url'    => 'dashicons-hammer',
		] );

		acf_add_options_page( [
			'page_title' => 'Баннеры',
			'menu_title' => 'Баннеры',
			'parent_slug'  => 'advanced-options',
			'slug' => 'banners-settings',
			'autoload'   =>  true
		] );

		acf_add_options_page( [
			'page_title'  => 'Бонусы',
			'menu_title'  => 'Бонусы',
			'menu_slug'   => 'bonus-settings',
			'capability'  => 'edit_posts',
			'redirect'    => false,
			'autoloader'  => false
		] );


	}

	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_create_block( 'image', 'Изображение', 'image' );
		acf_create_block( 'media-text', 'Текст и изображение', 'media-text', true );
		acf_create_block( 'brand-table', 'Таблица брендов', 'brand-table' );
//		acf_create_block( 'section', 'Секция', 'section', true );
//		acf_create_block( 'hidden-text', 'Скрытый текст (FAQ)', 'hidden-text', true );
		acf_create_block( 'single-brand', 'Блок одного бренда', 'single-brand', true );
		acf_create_block( 'link-block', 'Блок для перелинковки', 'link-block' );
		acf_create_block( 'howto', 'How To', 'howto' );
		acf_create_block( 'gallery', 'Галерея', 'gallery' );
		acf_create_block( 'icon-block', 'Блок с иконками', 'icon-block' );
		acf_create_block( 'video', 'Видео', 'video' );
		acf_create_block( 'matches-cards', 'Карточки матчей', 'matches-cards' );
		acf_create_block( 'reviews-rating', 'Статистика рейтинга', 'reviews-rating' );
		acf_create_block( 'reviews', 'Отзывы', 'reviews' );
		acf_create_block( 'terms-list', 'Определения', 'terms-list');
		acf_create_block( 'promocode', 'Промокод', 'promocode' );
//		acf_create_block( 'list-reviews-apps', 'List Reviews/Apps', 'list-reviews-apps' );
	}
} );



function register_acf_blocks() {
	register_block_type( get_template_directory() . '/partials/acf-blocks/cg-faq' );
	register_block_type( get_template_directory() . '/partials/acf-blocks/cg-section' );
	register_block_type( get_template_directory() . '/partials/acf-blocks/cg-welcome-sect-text' );
}

add_action( 'init', 'register_acf_blocks' );


