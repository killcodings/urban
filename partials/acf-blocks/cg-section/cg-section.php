<?php
$tag            = get_field( 'section_tag' ) ?? 'section';
$section_anchor = get_field( 'section_anchor' );
$section_class  = 'section-tag';
$breadcrumbs_class = '';
$opacity        = get_field('opacity') ?? '0';
$background_image = get_field('background_image');
$breadcrumbs_background = get_field('breadcrumbs_background') ?? 'transparent';
$bg_url_img   = wp_get_attachment_image_url( $background_image, 'full' );
$bg_url_img   = app_get_image_url( $bg_url_img );
$style_array    = [];
$style_array_breadcrumbs   = [];
$is_div = get_field('is_div', 'options') ?? false;
$tag = $is_div ? 'div' : $tag;

if ( get_field( 'background_color' ) ) {
	$style_array['background_color'] = "--background-color:" . get_field( 'background_color' );
}

if ( $background_image ) {
	$style_array['background_image'] = "--background-image: url({$bg_url_img});--opacity-bg:$opacity";
}

if ( get_field('divider_after') ) {
	$container_class = ' container_divider-after';
}

if ($breadcrumbs_background) {
	$breadcrumbs_class = ' bg';
}

if ( ! isset( $GLOBALS['breadcrumbs_showed'] ) ) {
	$style_array_breadcrumbs['color']       = "--breadcrumbs-color:" . ( get_field( 'breadcrumbs_color' ) ?: '#fff' );
	$style_array_breadcrumbs['color_hover'] = "--breadcrumbs-color-hover:" . ( get_field( 'breadcrumbs_color_hover' ) ?: '#fff' );
	$style_array_breadcrumbs['background_breadcrumbs'] = $breadcrumbs_background ? "--breadcrumbs-bg: $breadcrumbs_background" : "--breadcrumbs-bg: rgba(0,0,0,0)";
}

$style_string = implode( ';', $style_array ) ? 'style="' . implode( ';', $style_array ) . '"' : '';
$style_string_breadcrumbs = implode( ';', $style_array_breadcrumbs ) ? 'style="' . implode( ';', $style_array_breadcrumbs ) . '"' : '';
$id_string    = $section_anchor ? "id='$section_anchor'" : '';

acf_block_before( 'Секция', $is_preview );

if ( ( ! isset( $GLOBALS['breadcrumbs_showed'] ) ) && function_exists( 'kama_breadcrumbs' ) ) { ?>
    <div class="container<?= $breadcrumbs_class ?>" <?= $style_string_breadcrumbs ?>>
		<?php
		$GLOBALS['breadcrumbs_showed'] = false;
		$breadcrumbs_separator         = get_option( 'options_breadcrumbs_settings_separator' );
		kama_breadcrumbs( $breadcrumbs_separator );
		?>
    </div>
<?php } ?>

<?= "<$tag class='$section_class' $id_string $style_string>" ?>
    <div class="container<?=$container_class?>">
        <InnerBlocks/>
    </div>
<?= "</$tag>" ?>
<?php
acf_block_after( $is_preview );