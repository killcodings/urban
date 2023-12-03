<?php

$shortcodes = [
	'month' => date( 'F' )
];

function replace_shortcodes( $content ) {
	global $shortcodes;

	foreach ( $shortcodes as $shortcode => $value ) {
		$content = str_replace( "[$shortcode]", $value, $content );
	}

	return $content;
}

add_filter( 'the_content', 'replace_shortcodes' );
