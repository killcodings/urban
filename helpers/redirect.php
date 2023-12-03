<?php

function site_redirect() {

	$url = $_SERVER['REQUEST_URI'];
	if ( strpos( $_SERVER['REQUEST_URI'], "index.php" ) !== false ) {
		$url = str_replace( 'index.php', "", $url );
	}
	if ( strpos( $_SERVER['REQUEST_URI'], "index.html" ) !== false ) {
		$url = str_replace( 'index.html', "", $url );
	}
	if ( strpos( $_SERVER['REQUEST_URI'], "//" ) !== false ) {
		$url  = preg_replace( '/\/\/{1,}/', '', $url );
	}
	if ( $url !== $_SERVER['REQUEST_URI'] ) {
		$protocol = ( ! empty( $_SERVER['HTTPS'] ) && 'off' !== strtolower( $_SERVER['HTTPS'] ) ? "https://" : "http://" );
		$url = $protocol . $_SERVER['SERVER_NAME'] . $url;
		wp_redirect( $url, 301 );
	}
}

add_action( 'template_redirect', 'site_redirect' );
