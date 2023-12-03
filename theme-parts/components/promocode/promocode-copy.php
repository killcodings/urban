<?php
$class = '';
$style = '';
if ($args['is_custom_color']) {
	$color_promocode = $args['color_promocode'] ?? '#000';
	$class = ' custom-color';
	$style = "style='--color-promocode:$color_promocode'";
}

if ( $args['promocode'] ): ?>
	<div class="promocode promocode_transparent promocode_responsive<?= $class ?>" <?=$style?>>
		<div class="promocode__icon"></div>
		<div class="promocode__content">
			<p class="promocode__title">Promocode</p>
			<p class="promocode__value"><?= $args['promocode'] ?></p>
		</div>
		<button class="promocode__button dbutton dbutton_fill-white dbutton_medium copy-click-button site-button site-button_outline" data-copy="<?= $args['promocode'] ?>">Copy</button>
	</div>
<?php endif; ?>
