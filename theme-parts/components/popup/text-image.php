<div class="popup__content">
	<p class="popup__title" style="--title-color:<?= $args['title_color'] ?>"><?= $args['title'] ?></p>
	<div class="popup__text"
	     style="--text-color:<?= $args['text_color'] ?>"><?= $args['screen'] === 'mobile' ? $args['mobile_text'] : $args['desktop_text'] ?></div>
	<?php the_component( 'popup/buttons', [
		'button_1'                => $args['button_1'],
		'button_2'                => $args['button_2'],
		'button_background'       => $args['button_background'],
		'button_color'            => $args['button_color'],
		'button_background_2'     => $args['button_background_2'],
		'button_color_2'          => $args['button_color_2'],
		'is_change_button_colors' => $args['is_change_button_colors']
	] ) ?>
</div>
<div class="popup__aside">
	<?= app_get_image(['id' => $args['image']]) ?>
</div>
