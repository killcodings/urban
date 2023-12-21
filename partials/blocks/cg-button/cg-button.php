<?php


$button = get_field('button');
$choose_link = get_field('choose');
$icon_left = get_field('icon_left');
$icon_right = get_field('icon_right');

/*
$buttons_group = $args['buttons_group'];
$buttons = $buttons_group['button_repeater'];
$buttons_class = '';
$buttons_width       = $buttons_group['buttons_width'] ?? false;
$buttons_position   = $buttons_group['buttons_position'] ?? 'start';
$position_image = match($buttons_group['position_image_button']) {
	'top' => 'button_column',
	'left' => '',
	false => '',
	null => '',
	'' => '',
};
$buttons_setup = false;
$buttons_item_class = $buttons_group['buttons_item_class'] ?? '';
$buttons_item_class .= " $position_image";
$buttons_class = "buttons_columns-{$buttons_group['columns']}";

if ($buttons_group['is_custom_colors']) {
	$buttons_setup = $buttons_group['buttons_setup'];
}

$style_array = [
	'width' => $buttons_width ? "--button-width:{$buttons_width}" : '',
	'buttons_position' => "--position-btn:{$buttons_position}",
];
$style_array = app_array_filter_recursive($style_array);
$style_str = implode(';', $style_array);

$buttons_group = get_field('buttons_group', $post->ID);

$args = [
	'buttons_group' => $buttons_group,
];
*/

acf_block_before( 'Button', $is_preview );

	    if ( $choose_link === 'chose_link' ) {
		    $button_partner['url'] = $button['primary_nav_buttons_choose_link']['value'];
		    $button_partner['title'] = $button['primary_nav_buttons_choose_link']['label'];
		    $button = $button_partner;
	    }
	    echo app_get_button( $button, "",null, null, $icon_left, $icon_right );

acf_block_after( $is_preview );
//get_template_part( 'partials/blocks/cg-button/button' );
