<?php
$select_promocode = get_field('select_promocode') ?? 'promocode-copy';

$args = [
	'promocode' => get_field('promocode'),
	'bonus_input' => get_field('bonus_input'),
	'is_custom_color' => get_field('is_custom_color'),
	'color_promocode' => get_field('color_promocode'),
];

acf_block_before( 'Промокод', $is_preview );

echo get_component( "promocode/$select_promocode", $args );

acf_block_after( $is_preview );
