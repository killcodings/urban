<?php
function ajax_reviews() {
	global $wpdb;
	$post_ID = isset( $_POST['post_ID'] ) ? (int) $_POST['post_ID'] : 0;

	$comment_author       = ( isset( $_POST['name'] ) ) ? trim( strip_tags( $_POST['name'] ) ) : null;
	$comment_author_email = ( isset( $_POST['email'] ) ) ? trim( $_POST['email'] ) : null;
	$comment_content      = ( isset( $_POST['comment'] ) ) ? trim( $_POST['comment'] ) : null;
	$comment_rating      = ( isset( $_POST['rating'] ) ) ? trim( $_POST['rating'] ) : null;
	wp_new_comment( [
		'comment_post_ID'      => $post_ID,
		'comment_author'       => $comment_author,
		'comment_author_email' => $comment_author_email,
		'comment_content'      => $comment_content,
		'comment_type'         => 'reviews',
		'comment_meta' => ['rating' => $comment_rating]
	] );

	die();
}

add_action( 'wp_ajax_ajaxreviews', 'ajax_reviews' );
add_action( 'wp_ajax_nopriv_ajaxreviews', 'ajax_reviews' );
