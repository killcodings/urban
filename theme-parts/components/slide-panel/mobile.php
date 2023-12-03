<?php
$brand_data         = $args['brand_data'];
$is_change_colors   = $args['is_change_colors'];
$colors_data        = $args['colors_data'];
$is_rating_or_bonus = $args['is_rating_or_bonus'];

$class  = '';
$colors = '';
$button_class = 'dbutton_fill-primary';
if ( $is_change_colors ) {
	$class  = 'slide-panel_custom';
	$colors = "style='--bg:{$colors_data['background']};--color:{$colors_data['color']};--button-bg:{$colors_data['button_background']};--button-color:{$colors_data['button_color']}'";
	$button_class = 'dbutton_custom';
}

$class .= $is_rating_or_bonus === 'rating' ? ' slide-panel_rating' : ' slide-panel_bonus';

?>
<div class="slide-panel slide-panel_mobile <?= $class ?>" <?= $colors ?>>
	<?php if ( $is_rating_or_bonus === 'rating' ): ?>
		<div class="slide-panel__brand brand-logo-rating brand-logo-rating_small">
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
	<?php else: ?>
		<div class="slide-panel__brand brand-logo-rating brand-logo-rating_small">
			<div class="brand-logo-rating__logo">
				<?= app_get_image(['id' => $brand_data['logo']]) ?>
			</div>
		</div>
		<div class="slide-panel__bonus">
			<?= $brand_data['bonus'] ?>
		</div>
	<?php endif; ?>
	<?= app_get_button( $brand_data['button'], "slide-panel__button $button_class site-button_outline" ) ?>
</div>
