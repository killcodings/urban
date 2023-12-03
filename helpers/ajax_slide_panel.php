<?php
function slide_panel_ajax() {
	if ( $_POST['pageID'] ) {
		$slide_panels = get_field( 'slide_panels', $_POST['pageID'] );
	} else {
		$slide_panels = get_field( 'slide_panels', 'options' );
	}
	usort( $slide_panels, function ( $current, $next ) {
		return $current['chance'] - $next['chance'];
	} );
	$active_panel = null;
	$random       = random_int( 0, 99 );

	$start_value = $slide_panels[0]['chance'];
	foreach ( $slide_panels as $index => $panel ) {
		if ( $random < $start_value ) {
			$active_panel = $panel;
			break;
		}

		$start_value += $slide_panels[ $index + 1 ]['chance'];
	}

	$brand_data = [
		'logo'      => $active_panel['logo'],
		'name'      => $active_panel['name'],
		'rating'    => $active_panel['rating'],
		'button'    => $active_panel['button'],
//		'mobile_button'    => $active_panel['mobile_button'],
		'bonus'     => $active_panel['bonus'],
		'promocode' => $active_panel['promocode']
	];
	$color_data = [
		'background'        => $active_panel['background'],
		'color'             => $active_panel['color'],
		'button_background' => $active_panel['button_background'],
		'button_color'      => $active_panel['button_color']
	];

	$panel = get_component( 'slide-panel/slide-panel', [
		'brand_data'         => $brand_data,
		'is_change_colors'   => $active_panel['is_change_colors'],
		'colors_data'        => $color_data,
		'is_rating_or_bonus' => $active_panel['is_rating_or_bonus']
	] );

	$render_data = [
		'delay' => $active_panel['delay'],
		'panel' => $panel
	];

	echo json_encode( $render_data, JSON_THROW_ON_ERROR );

	wp_die();
}

add_action( 'wp_ajax_slide_panel_ajax', 'slide_panel_ajax' );
add_action( 'wp_ajax_nopriv_slide_panel_ajax', 'slide_panel_ajax' );
