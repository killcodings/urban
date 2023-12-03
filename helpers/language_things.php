<?php
$language_urls_new = [
	"default",
	"mz",
	"br"
];

function language_matchs() {
	global $language_urls_new;
	$request_slugs = explode( "/", $_SERVER['REQUEST_URI'] );
	// local
	$request_slugs_local = explode( "/", $_SERVER['HTTP_HOST'] );
	$flag = false;
	if ($request_slugs_local[0] === "localhost") {
		if (strpos( $_SERVER['REQUEST_URI'], '/mz/' ) !== false) {
			$flag = true;
		}
		if (strpos( $_SERVER['REQUEST_URI'], '/br/' ) !== false) {
			$flag = true;
		}
	}
	if ( in_array( $request_slugs[1], $language_urls_new ) || $flag ) {
		return true;
	}
	return false;
}
