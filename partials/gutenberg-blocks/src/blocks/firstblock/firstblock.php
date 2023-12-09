<?php

function firstblock_init() {
	register_block_type_from_metadata(__DIR__ );
}
add_action('init', 'firstblock_init');
