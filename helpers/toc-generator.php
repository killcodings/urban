<?php

function render_toc_auto() {
	$admin_toc_class = '';
    $toc_template = get_field('toc_template', 'options') ?: '';
    $is_toc_open = get_field('is_toc_open', 'options') ?? false;
    $toc_options_group = get_field('toc_options_group', 'options');
    $is_not_level = get_field('is_not_level', 'options') ?? false;


    $toc_list_class = '';
    if ($toc_template === 'columns') {
        $toc_list_class = 'toc__list_columns';
    }
    if ($toc_template === 'buttons') {
	    $toc_list_class = 'toc__list_buttons';
    }

    if ($is_toc_open) {
	    $toc_list_class .= ' toc__list_open';
    }
    if ($is_not_level) {
	    $toc_list_class .= ' toc__list_not_level';
    }
	if ( is_admin() ) {
		echo "<button type='button' id='generate-toc' class='components-button is-primary'>Generate TOC</button>";
		$admin_toc_class = 'toc__list_showed';
	}

	$style_array = [
		'toc_color' => $toc_options_group['toc_color'] ? "--toc-color:{$toc_options_group['toc_color']}" : '',
		'toc_bg_buttons' => $toc_options_group['toc_bg_buttons'] ? "--toc-bg-buttons:{$toc_options_group['toc_bg_buttons']}" : '',
		'toc_background' => $toc_options_group['toc_background'] ? "--toc-background:{$toc_options_group['toc_background']}" : ''
	];

	$style_array = app_array_filter_recursive($style_array);
	$style_str = implode(';', $style_array);

	if ($style_str) {
		$style_str = "style='$style_str'";
	}

	$url                 = (( ! empty($_SERVER['HTTPS'])) ? 'https' : 'http')
	                       . '://' . $_SERVER['HTTP_HOST']
	                       . $_SERVER['REQUEST_URI'];
	?>
    <div class="container">
        <nav class="toc" <?=$style_str?>>
            <h2 class="toc__title"><?= get_field( 'toc_title' ) ?></h2>
            <button type="button" class="toc__show"><?= Translate::get('toc_show') ?></button>
            <ol class="toc__list <?= $admin_toc_class, $toc_list_class ?>">
				<?php
                $toc_content = get_field( 'toc_content' );
                $replace_str = 'href="' . get_permalink($post->ID);
				$toc_content = str_replace( array(
					'href="',
					'<ol></ol>',
					'<ol></ol>',
					'<ol></ol>'
				), array( $replace_str, '', '', '' ), $toc_content );
                echo $toc_content;
                ?>
            </ol>
        </nav>
    </div>
	<?php
}

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_register_block_type( [
		'name'            => 'toc-auto',
		'title'           => __( 'TOC (auto)' ),
		'description'     => __( 'TOC (auto)' ),
		'render_callback' => 'render_toc_auto',
		'category'        => 'toc',
		'mode'            => 'edit'
	] );
}

// Create TOC field
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_60c9c46a78d0c',
		'title' => 'TOC (auto)',
		'fields' => array(
			array(
				'key' => 'field_60c9c505b43c1',
				'label' => 'TOC Content',
				'name' => 'toc_content',
				'aria-label' => '',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'new_lines' => '',
				'rows' => '',
			),
			array(
				'key' => 'field_toc_title',
				'label' => 'TOC Title',
				'name' => 'toc_title',
				'aria-label' => '',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/toc-auto',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));

endif;

// Enqueue toc-generator.js
add_action( 'current_screen', function () {
	$screen = get_current_screen();
	if ( $screen->post_type === 'page' || ( $screen->post_type === 'post' && $screen->is_block_editor ) ) {
		wp_enqueue_script( 'toc-generator', get_template_directory_uri() . '/helpers/toc-generator.js', null,
			null, true );
	}
} );
