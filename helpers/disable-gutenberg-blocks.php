<?php
/*
add_filter( 'allowed_block_types_all', function () {
	return array(
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/table',
		'core/columns',
		'core/table',
		'core/html',
		'acf/image',
		'acf/media-text',
		'acf/brand-table',
		'acf/section',
		'acf/hidden-text',
		'acf/single-brand',
		'acf/link-block',
		'acf/toc-auto',
		'acf/howto',
		'acf/gallery',
		'acf/icon-block',
		'acf/feedback-form',
		'acf/video',
		'acf/matches-cards',
		'acf/reviews-rating',
		'acf/reviews'
	);
} );*/

/*
// Change defaults
function disable_some_blocks( $allowed_block_types, $editor_context ) {
	// get all the registered blocks
	$blocks_list = WP_Block_Type_Registry::get_instance()->get_all_registered();
	$disable_blocks = array(
		// @link: https://developer.wordpress.org/block-editor/reference-guides/core-blocks/
		"core/archives",
		"core/avatar",
		"core/calendar",
		"core/categories",
		"core/comment-author-avatar",
		"core/comment-author-name",
		"core/comment-content",
		"core/comment-date",
		"core/comment-edit-link",
		"core/comment-reply-link",
		"core/comment-template",
		"core/comments",
		"core/comments-pagination",
		"core/comments-pagination-next",
		"core/comments-pagination-numbers",
		"core/comments-pagination-previous",
		"core/comments-title",
		"core/form",
		"core/form-input",
		"core/form-submission-notification",
		"core/form-submit-button",
		"core/home-link",
		"core/latest-comments",
		"core/latest-posts",
		"core/loginout",
		"core/navigation",
		"core/navigation-link",
		"core/navigation-submenu",
		"core/page-list",
		"core/page-list-item",
		"core/pattern",
		"core/post-author",
		"core/post-author-biography",
		"core/post-author-name",
		"core/post-comments",
		"core/rss",
		"core/search",
		"core/tag-cloud",
		"core/site-logo",
		"core/site-title",
		"core/site-tagline",
		"core/social-links",
		"core/query",
		"core/post-title",
		"core/post-excerpt",
		"core/post-featured-image",
		"core/post-date",
		"core/post-terms",
		"core/post-navigation-link",
		"core/read-more",
		"core/post-comments-form",
		"core/term-description",
		"core/query-title",
		"core/html",
		"core/shortcode"
	);
	if ( ! empty( $editor_context->post ) ) {
		foreach ( $disable_blocks as $name ) {
			unset( $blocks_list[ $name ] );
		}
	}
	return array_keys( $blocks_list );
}

add_filter( 'allowed_block_types_all', 'disable_some_blocks', 20, 2 );*/
