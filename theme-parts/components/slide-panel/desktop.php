<?php
$brand_data         = $args['brand_data'];
$is_change_colors   = $args['is_change_colors'];
$colors_data        = $args['colors_data'];

$class  = '';
$colors = '';
$button_class = 'dbutton_fill-primary';
if ( $is_change_colors ) {
	$class  = 'slide-panel_custom';
	$colors = "style='--bg:{$colors_data['background']};--color:{$colors_data['color']};--button-bg:{$colors_data['button_background']};--button-color:{$colors_data['button_color']}'";
	$button_class = 'dbutton_custom';
}

?>
<div class="slide-panel slide-panel_desktop <?= $class ?>" <?= $colors ?>>
	<div class="slide-panel__brand brand-logo-rating brand-logo-rating_medium">
		<div class="brand-logo-rating__logo">
			<?= app_get_image(['id' => $brand_data['logo']]) ?>
		</div>
		<div class="brand-logo-rating__content">
			<p class="brand-logo-rating__name"><?= $brand_data['name'] ?></p>
			<div class="brand-logo-rating__stars">
				<span class="brand-logo-rating__value"><?= $brand_data['rating'] ?></span>
				<span class="brand-logo-rating__icons" style="--rating: <?= $brand_data['rating'] * 20 ?>%">
                    ★★★★★
                </span>
			</div>
		</div>
	</div>
	<div class="welcome-bonus welcome-bonus_large">
		<div class="welcome-bonus__icon"></div>
		<div class="welcome-bonus__text welcome-bonus__text_single"><?= $brand_data['bonus'] ?></div>
	</div>
	<div class="promocode promocode_large">
		<div class="promocode__icon"></div>
		<div class="promocode__content"><?= $brand_data['promocode'] ?></div>
	</div>
	<?= app_get_button( $brand_data['button'], "slide-panel__button $button_class site-button_outline" ) ?>
</div>
