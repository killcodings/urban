<?php
$buttons_group = get_field('buttons_group', $post->ID);

$args = [
	'buttons_group' => $buttons_group,
];

acf_block_before( 'Кнопки', $is_preview );

	echo get_component( 'buttons/buttons', $args );

acf_block_after( $is_preview );
