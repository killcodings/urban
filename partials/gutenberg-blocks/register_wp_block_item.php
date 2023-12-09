<?php
//require_once plugin_dir_path( __FILE__ ) . 'wp-block-item-button/wp-block-item-button.php';
//require_once plugin_dir_path( __FILE__ ) . 'wp-block-item-buttons/wp-block-item-buttons.php';
//require_once plugin_dir_path( __FILE__ ) . 'gutenpride/gutenpride.php';

/*function blocks_course_plugin_boilerplate_enqueue_assets() {
	$asset_file = include(plugin_dir_path( __FILE__ ) . 'build/index.asset.php');
	wp_enqueue_script( 'cg-script', plugins_url('build/index.js', __FILE__), $asset_file['dependencies'], $asset_file['version']);
	wp_enqueue_style( 'blocks-course-plugin-boilerplate-style', plugins_url('build/index.css', __FILE__) );
}*/
//add_action( 'enqueue_block_editor_assets', 'blocks_course_plugin_boilerplate_enqueue_assets' );

function register_wp_block_cg_init() {
	$block_directories = glob(__DIR__ . "/dist/*", GLOB_ONLYDIR);

	foreach ($block_directories as $block) {
		register_block_type( $block );
	}
}
add_action( 'init', 'register_wp_block_cg_init' );


// ADD BLOCK CATEGORIES TO TOP OF INSERTER
function custom_block_category( $categories, $post ) {
	return array_merge(
			array(
					array(
							'slug' => 'cg-blocks',
							'title' => 'CG Blocks',
					),
			),
			$categories
	);
}
add_filter( 'block_categories_all', 'custom_block_category', 10, 2);
