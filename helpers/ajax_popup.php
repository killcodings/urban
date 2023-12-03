<?php
function ajax_popup() {
	if ( $_POST['pageID'] ) {
		$popups = get_field( 'popups', $_POST['pageID'] );
	} else {
		$popups = get_field( 'popups', 'options' );
	}
	usort( $popups, function ( $current, $next ) {
		return $current['item']['chance'] - $next['item']['chance'];
	} );
	$popup_active = null;
	$random       = random_int( 0, 99 );

	$start_value = $popups[0]['item']['chance'];
	foreach ( $popups as $index => $popup ) {
		if ( $random < $start_value ) {
			$popup_active = $popup;
			break;
		}
		$start_value += $popups[ $index + 1 ]['item']['chance'];
	}

	$type        = $popup_active['item']['type'];
	$popup_setup = $popup_active['item'][ $type ];

	$popup = get_component( 'popup/popup', [
		'type' => $type,
		'data' => $popup_setup
	] );

	$render_data = [
		'popup' => $popup,
		'delay' => $popup_active['item']['delay'],
		'popupRand' => $start_value
	];

	echo json_encode( $render_data, JSON_THROW_ON_ERROR );

	wp_die();
}

add_action( 'wp_ajax_ajax_popup', 'ajax_popup' );
add_action( 'wp_ajax_nopriv_ajax_popup', 'ajax_popup' );
