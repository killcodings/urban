<?php
function ajax_feedback() {
	global $wpdb;
	$post_ID = isset( $_POST['post_ID'] ) ? (int) $_POST['post_ID'] : 0;

	$comment_author       = ( isset( $_POST['name'] ) ) ? trim( strip_tags( $_POST['name'] ) ) : null;
	$comment_author_email = ( isset( $_POST['email'] ) ) ? trim( $_POST['email'] ) : null;
	$comment_content      = ( isset( $_POST['comment'] ) ) ? trim( $_POST['comment'] ) : null;
	$comment_rating      = ( isset( $_POST['rating'] ) ) ? trim( $_POST['rating'] ) : null;
	$comment_subtitle      = ( isset( $_POST['subtitle'] ) ) ? trim( $_POST['subtitle'] ) : null;
	wp_new_comment( [
		'comment_post_ID'      => $post_ID,
		'comment_author'       => $comment_author,
		'comment_author_email' => $comment_author_email,
		'comment_content'      => $comment_content,
		'comment_type'         => 'feedback_block',
		'comment_meta' => ['subtitle' => $comment_subtitle, 'rating' => $comment_rating]
	] );

	die();
}

add_action( 'wp_ajax_ajaxfeedbacks', 'ajax_feedback' );
add_action( 'wp_ajax_nopriv_ajaxfeedbacks', 'ajax_feedback' );
