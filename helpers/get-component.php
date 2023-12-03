<?php

function the_component($name, $args) {
	return get_template_part("theme-parts/components/$name", null, $args);
}

function get_component($name, $args) {
	ob_start();
	the_component($name, $args);
	return ob_get_clean();
}
