<?php
$type           = $args['type'];
$data           = $args['data'];
$data['screen'] = $_POST['screen'];

if ( $type === 'image' ) {
	$wrapper_class = 'popup_image';
} elseif ( $type === 'text_image' ) {
	$wrapper_class = 'popup_text-image';
} elseif ( $type === 'brand' ) {
	$wrapper_class = match ( $data['screen'] ) {
		'desktop' => 'popup_brand-widget_desktop popup_secondary',
		'mobile' => 'popup_brand-widget_mobile popup_secondary'
	};
}
?>
<div class="popup <?= $wrapper_class ?>" style="background-color: <?= $data['background'] ?>">
    <span class="popup__cross">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none">
            <path d="M13 1 1 13M1 1l12 12" stroke="<?= $data['cross'] ?>" stroke-width="2" stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </span>
	<?php if ( $type === 'image' ) {
		get_template_part( 'theme-parts/components/popup/image', null, $data );
	} elseif ( $type === 'text_image' ) {
		get_template_part( 'theme-parts/components/popup/text-image', null, $data );
	} elseif ( $type === 'brand' ) {
		get_template_part( 'theme-parts/components/popup/brand', null, $data );
	} ?>
</div>
