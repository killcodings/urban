<?php

acf_block_before( 'Welcome-sect-text', $is_preview ); ?>
	<div class="cg-welcome-sect-text cg-section__content">

        <InnerBlocks template="<?php echo esc_attr( wp_json_encode( [['core/heading'], ['cg/paragraph-max-width'], ['cg/cg-sect-pic'], ['cg/paragraph-max-width']] ) ); ?>" />

	</div>

<?php
acf_block_after( $is_preview );
