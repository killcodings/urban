<?php

acf_block_before( 'Welcome-sect-text', $is_preview ); ?>

	<div class="cg-welcome-sect-text cg-section__content">
		<InnerBlocks/>
	</div>

<?php
acf_block_after( $is_preview );
