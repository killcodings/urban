<?php
$brand_data       = $args['brand_data'];
$is_change_colors = $args['is_change_colors'];
$colors_data      = $args['colors_data'];
$screen           = $_POST['screen'];

if ( $screen === 'mobile' ) {
	the_component( 'slide-panel/mobile', [
		'brand_data'         => $brand_data,
		'is_change_colors'   => $is_change_colors,
		'colors_data'        => $colors_data,
		'is_rating_or_bonus' => $args['is_rating_or_bonus']
	] );
} else {
	the_component( 'slide-panel/desktop', [
		'brand_data'       => $brand_data,
		'is_change_colors' => $is_change_colors,
		'colors_data'      => $colors_data
	] );
}
