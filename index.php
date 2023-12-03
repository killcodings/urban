<!doctype html>
<?php
if (strpos($_SERVER['REQUEST_URI'], '/mz/') !== false) { ?>
    <html lang="pt-MZ">
<?php } elseif (strpos($_SERVER['REQUEST_URI'], '/br/') !== false) { ?>
    <html lang="pt-BR">
<?php } else { ?>
<html <?php language_attributes(); ?>>
<?php } ?>
<?php app_get_partial( 'shared/head' ); ?>
<body <?php body_class() ?> <?= app_get_body_attrs() ?>>
<?php
echo get_field( 'body_metric', 'options' );
app_get_partial( 'shared/header' );
echo get_field('body_custom_code', $post->id);
?>
<main>
	<?php

	if ( is_singular( 'page' ) || is_singular( 'post' ) ) {
		app_get_partial( 'templates/page' );
	}

	if ( is_archive() && is_author() ) {
		app_get_partial( 'templates/author' );
	}

	if ( ! is_front_page() && is_home() ) {
		app_get_partial( 'templates/archive' );
	}

	if ( is_404() ) {
		app_get_partial( 'templates/404' );
	}

	if ( comments_open() ) {
		comments_template( '/partials/shared/comments-form.php' );
	} ?>
</main>
<?php
app_get_partial( 'shared/footer' );
echo get_field('footer_metric', 'options');
?>
</body>
</html>
