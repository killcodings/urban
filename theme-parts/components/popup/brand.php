<?php
$screen        = $args['screen']; // Screen width
$brand_setup = get_field('brand_setup', $args['brand_id']);
$brand_data    = [
	'logo'       => $brand_setup['icon'],
	'name'       => $brand_setup['name'],
	'rating'     => $brand_setup['rating'],
	'highlights' => $brand_setup['cons'],
	'bonus'      => $brand_setup['bonus'],
	'color'      => $brand_setup['icon_background']
];
$buttons = [
	'button_1'                => $args['button_1'],
	'button_2'                => $args['button_2'],
	'button_background'       => $args['button_background'],
	'button_color'            => $args['button_color'],
	'button_background_2'     => $args['button_background_2'],
	'button_color_2'          => $args['button_color_2'],
	'is_change_button_colors' => $args['is_change_button_colors']
];

if ( $screen === 'mobile' ): ?>
	<p class="popup__title" style="--title-color:<?= $args['title_color'] ?>">
		<?= $args['title'] ?>
	</p>
	<div class="popup__aside">
		<?php the_component( 'brand-widget/brand-widget', [
			'wrapper_class' => 'popup__brand',
			'data'          => $brand_data
		] ); ?>
	</div>
	<?php the_component( 'popup/buttons', $buttons ); ?>
<?php elseif ( $screen === 'desktop' ): ?>
	<div class="popup__content">
		<p class="popup__title" style="--title-color:<?= $args['title_color'] ?>">
			<?= $args['title'] ?>
		</p>
		<div class="popup__text" style="--text-color:<?= $args['text_color'] ?>">
			<?= $args['text'] ?>
		</div>
		<?php the_component( 'popup/buttons', $buttons ); ?>
	</div>
	<div class="popup__aside">
		<?php the_component( 'brand-widget/brand-widget', [
			'wrapper_class' => 'popup__brand',
			'data'          => $brand_data
		] ); ?>
	</div>
<?php endif; ?>
