<?php
/*
 * wrapper_class
 * data =>
     * logo
     * rating
     * name
     * color
     * highlights
     * bonus
 * colors
 */
$brand_data = $args['data'];
$colors     = $args['colors'];

?>
<div class="<?= $args['wrapper_class'] ?> brand-widget">
	<p class="brand-widget__title"
	   style="--bg:<?= $colors['badge_bg'] ?>;--color:<?= $colors['badge_color'] ?>">
		Best bookmaker for T20 by CBG</p>
	<?php get_template_part( 'theme-parts/components/brand-logo-rating/brand-logo-rating', null, [
		'size'   => 'responsive',
		'image'  => $brand_data['logo'],
		'name'   => $brand_data['name'],
		'rating' => $brand_data['rating'],
		'color'  => $brand_data['color']
	] ); ?>
	<p class="brand-widget__subtitle"><?= $brand_data['name'] ?> Highlights</p>
	<?php if ( $brand_data['highlights'] ): ?>
		<ul class="newhighlights">
			<?php foreach ( $brand_data['highlights'] as $highlight ): ?>
				<li class="newhighlights__item"
				    style="--bg:<?= $colors['highlights_bg'] ?>;--color:<?= $colors['highlights_color'] ?>">
					<?= $highlight['item'] ?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	<div class="welcome-bonus welcome-bonus_gray welcome-bonus_small">
		<?php if ( $colors['bonus_icon'] ): ?>
			<div class="welcome-bonus__icon welcome-bonus__icon_no-icon"
			     style="--bg:<?= $colors['bonus_bg'] ?>;">
				<?= get_image( $colors['bonus_icon'] ) ?>
			</div>
		<?php else: ?>
			<div class="welcome-bonus__icon"></div>
		<?php endif; ?>
		<div class="welcome-bonus__text"><?= apply_filters( 'the_content', $brand_data['bonus'] ) ?></div>
	</div>
	<?php if ( $brand_data['link'] ): ?>
		<div style="--bg:<?= $colors['button_bg'] ?>;--color:<?= $colors['button_color'] ?>">
			<?= get_dbutton( $brand_data['link'], 'brand-widget__button dbutton_fill-primary dbutton_large' ) ?>
		</div>
	<?php endif; ?>
</div>
