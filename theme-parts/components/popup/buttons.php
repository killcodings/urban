<?php
$button_1 = $args['button_1'] || false;
$button_2 = $args['button_2'] || false;

if ( $button_1 || $button_2 ):
	if ( $args['is_change_button_colors'] ): ?>
		<div class="popup__buttons"
		     style="--button-background: <?= $args['button_background'] ?>;--button-color: <?= $args['button_color'] ?>;--button-background-2: <?= $args['button_background_2'] ?>;--button-color-2: <?= $args['button_color_2'] ?>;">
			<?php if ( $button_1 ) {
				echo app_get_button( $args['button_1'], 'popup__button dbutton_custom dbutton_small' );
			}
			if ( $button_2 ) {
				echo app_get_button( $args['button_2'], 'popup__button dbutton_custom dbutton_small' );
			} ?>
		</div>
	<?php else: ?>
		<div class="popup__buttons">
			<?php if ( $button_1 ) {
				echo app_get_button( $args['button_1'], 'popup__button dbutton_fill-primary dbutton_small site-button_outline' );
			}
			if ( $button_2 ) {
				echo app_get_button( $args['button_2'], 'popup__button dbutton_outline-primary dbutton_small site-button_outline' );
			} ?>
		</div>
	<?php
	endif;
endif; ?>
