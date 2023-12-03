<?php
$image_id = get_field( 'image_id' );
$is_iframe = get_field('is_iframe') ?? false;
$class = $is_iframe ? "image_iframe" : '';


acf_block_before('Изображение', $is_preview);

echo app_get_image( [
	'id' => $image_id,
	'classes' => "image $class"
] );

acf_block_after($is_preview);
