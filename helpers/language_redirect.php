<?php

function my_author_rewrite_rules() {
	global $language_urls_new;
	$authors = get_users();
	foreach ( $authors as $author ) {

		$super_lan_slug = substr( $author->nickname, strrpos( $author->nickname, '-' ), strlen( $author->nickname ) ); // Получить -mz
		$super_lan_slug = str_replace( "-", "", $super_lan_slug ); // mz

		if ( in_array( $super_lan_slug, $language_urls_new ) ) { // есть ли в массиве языков версия языка у юзера
			$author_url_end = str_replace( '-' . $super_lan_slug, "", $author->nickname ); // получть username без -mz
			$author_rules[ $super_lan_slug . '/author/' . $author_url_end ]                                       = 'index.php?author=' . $author->ID;
			$author_rules[ $super_lan_slug . '/author/' . $author_url_end . '/page/?([0-9]{1,})/?$' ]             = 'index.php?author=$author->' . $author->ID . '&paged=$matches[1]';
			$author_rules[ $super_lan_slug . '/author/' . $author_url_end . '/(feed|rdf|rss|rss2|atom)/?$' ]      = 'index.php?author=' . $author->ID . '&feed=$matches[1]';
			$author_rules[ $super_lan_slug . '/author/' . $author_url_end . '/feed/(feed|rdf|rss|rss2|atom)/?$' ] = 'index.php?author=' . $author->ID . '&feed=$matches[1]';
		} else {
			$author_rules[ 'author/' . $author->nickname ]                                       = 'index.php?author=' . $author->ID;
			$author_rules[ 'author/' . $author->nickname . '/page/?([0-9]{1,})/?$' ]             = 'index.php?author=$author->' . $author->ID . '&paged=$matches[1]';
			$author_rules[ 'author/' . $author->nickname . '/(feed|rdf|rss|rss2|atom)/?$' ]      = 'index.php?author=' . $author->ID . '&feed=$matches[1]';
			$author_rules[ 'author/' . $author->nickname . '/feed/(feed|rdf|rss|rss2|atom)/?$' ] = 'index.php?author=' . $author->ID . '&feed=$matches[1]';

		}
	}

	return $author_rules;
	/*	$author_rules = [
			'mz/author/pavel'=>'index.php?author=1',
			'mz/author/oleg'=>'index.php?author=2',
		];*/
}

function flush_user() {
	flush_rewrite_rules();
}

function user_redirect() {

	global $wp;
	global $language_urls_new;
	if ( is_author() ) {
		$author         = get_the_author_meta( 'nickname' );
		$super_lan_slug = substr( $author, strrpos( $author, '-' ), strlen( $author ) ); // -mz
		$super_lan_slug = str_replace( "-", "", $super_lan_slug ); // mz

		if ( in_array( $super_lan_slug, $language_urls_new ) ) {
			$author_url_end = str_replace( "-" . $super_lan_slug, "", $author ); // Username not -mz
			$protocol = (!empty($_SERVER['HTTPS']) && 'off' !== strtolower($_SERVER['HTTPS'])?"https://":"http://"); // получить либо http или https
			$redirect_url =  $protocol . $_SERVER['SERVER_NAME'] . "/" . $super_lan_slug . '/author/' . $author_url_end; // url
//			$redirect_url = WP_SITEURL . $super_lan_slug . '/author/' . $author_url_end; // Если на сервере есть константа WP_SITEURL (работает локально)
			$current_url  = home_url( add_query_arg( array(), $wp->request ) ); // получить текущий url
			if ( $redirect_url !== $current_url ) {
				wp_redirect( $redirect_url, 301 );
				exit();
			}
		}
	}
}

function wp_kama_the_author_link_filter( $link ) {
	global $language_urls_new;
	$super_lan_slug = substr( $link, strrpos( $link, '-' ), strlen( $link ) ); //	$link = "author/pavel/"; $link = "author/pavel-mz/"; -mz
	$super_lan_slug = str_replace( "-", "", $super_lan_slug ); // mz/
	$super_lan_slug = str_replace( "/", "", $super_lan_slug ); // mz

	if ( in_array( $super_lan_slug, $language_urls_new ) ) {
		$link = str_replace( "-" . $super_lan_slug, "", $link ); // author/pavel-mz/ -> author/pavel/
		$link = str_replace( '/author/', "/" . $super_lan_slug . "/author/", $link ); // author/pavel/ -> mz/author/pavel-mz/
	}
	return $link;
}

add_filter( 'author_link', 'wp_kama_the_author_link_filter' ); // в WP записываются новые url для mz author
add_action( 'author_rewrite_rules', 'my_author_rewrite_rules' );
add_action( 'template_redirect', 'user_redirect' ); //
add_action( 'profile_update', 'flush_user', 10, 3 ); // Когда обновляется профиль
add_filter( 'user_register', 'flush_user', 10, 3 ); // Когда регистрируется профиль
