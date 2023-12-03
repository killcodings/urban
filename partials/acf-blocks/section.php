<?php
$tag            = get_field( 'section_tag' ) ?? 'section';
$section_anchor = get_field( 'section_anchor' );
$section_class  = 'section-tag';
$style_array    = [];

if ( get_field( 'background_color' ) ) {
	$style_array['background_color'] = "--background-color:" . get_field( 'background_color' );
}

if ( ! isset( $GLOBALS['breadcrumbs_showed'] ) ) {
	$style_array['color']       = "--breadcrumbs-color:" . ( get_field( 'breadcrumbs_color' ) ?: '#fff' );
	$style_array['color_hover'] = "--breadcrumbs-color-hover:" . ( get_field( 'breadcrumbs_color_hover' ) ?: '#fff' );
}

$style_string = implode( ';', $style_array ) ? 'style="' . implode( ';', $style_array ) . '"' : '';
$id_string    = $section_anchor ? "id='$section_anchor'" : '';

acf_block_before( 'Секция', $is_preview );
?>
<?= "<$tag class='$section_class' $id_string $style_string>" ?>
    <div class="container">
		<?php
		global $wp;
		$url = $_SERVER['REQUEST_URI'];
//		(strpos($url, '/mz/?([0-9]{1,})/?$');
		$parse = parse_url($url, PHP_URL_PATH);
//		$parse_local = explode( "/", WP_SITEURL );
		$parse_local = explode( "/", $_SERVER['HTTP_HOST'] );
        $flag_local = false;
        if ($parse_local[0] === "localhost") {
	        $flag_local = true;
	        $parse_local_explode = explode( "/", $url );
            if ($parse_local_explode[3] !== '' ) {
	            if ( ( ! isset( $GLOBALS['breadcrumbs_showed'] ) ) && function_exists( 'kama_breadcrumbs' ) ) {
		            $GLOBALS['breadcrumbs_showed'] = false;
		            $breadcrumbs_separator         = get_option( 'options_breadcrumbs_settings_separator' );
		            kama_breadcrumbs( $breadcrumbs_separator );
	            }
            }
        }
        if (!$flag_local) {
	        if (substr($parse, 4) !== '') {
		        if ( ( ! isset( $GLOBALS['breadcrumbs_showed'] ) ) && function_exists( 'kama_breadcrumbs' ) ) {
			        $GLOBALS['breadcrumbs_showed'] = false;
			        $breadcrumbs_separator         = get_option( 'options_breadcrumbs_settings_separator' );
			        kama_breadcrumbs( $breadcrumbs_separator );
		        }
	        }
        }
        ?>
        <InnerBlocks/>
    </div>
<?= "</$tag>" ?>
<?php
acf_block_after( $is_preview );


if ( ! isset( $GLOBALS['author-badge-top'] ) ) {
	$is_enabled_author_top = get_field( 'is_enabled_author_top', 'options' ) ?? false;
	if ($is_enabled_author_top) {
		app_get_partial( 'shared/author-badge-top' );
	}
	$GLOBALS['author-badge-top'] = false;
}
