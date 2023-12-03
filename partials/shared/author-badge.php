<?php
$author_id    = $post->post_author;
$currentLang  = Translate::getLang();
$author_setup = get_field( 'user_setup', "user_$author_id" );
if ( $currentLang === 'en' ) {
	$currentLang = '';
} else {
	$currentLang = "_$currentLang";
}
$is_add_author_badge = get_field('is_add_author_badge', $post->ID);
?>

<div class="container">
    <section class="author-badge">
        <h2 class="author-badge__title"><?= Translate::get('post_author') ?></h2>
        <div class="author-badge__block">
            <div class="author-badge__avatar">
				<?= app_get_image( [ 'id' => $author_setup["avatar"] ], false,  $author_setup['alt']) ?>
            </div>
            <article class="author-badge__content">
                <h3 class="author-badge__name"><?= "{$author_setup["name$currentLang"]} {$author_setup["last_name$currentLang"]}" ?></h3>
                <div class="author-badge__description"><?= $author_setup["description$currentLang"] ?></div>
            </article>
            <a href="<?= get_author_posts_url( $author_id ) ?>" class="author-badge__link"></a>
        </div>
    </section>
	<?php if ($is_add_author_badge) : ?>
        <section class="author-badge">
			<?php
			$users_id = get_field('users_id', $post->ID );
			$author_setup = get_field( 'user_setup', "user_$users_id" );
			$author_badge_title = get_field('author_badge_title', $post->ID);
			?>
            <h2 class="author-badge__title"><?= $author_badge_title ?: Translate::get('post_author') ?></h2>
            <div class="author-badge__block">
                <div class="author-badge__avatar">
					<?= app_get_image( [ 'id' => $author_setup["avatar"] ], false,  $author_setup['alt']) ?>
                </div>
                <article class="author-badge__content">
                    <h3 class="author-badge__name"><?= "{$author_setup["name$currentLang"]} {$author_setup["last_name$currentLang"]}" ?></h3>
                    <div class="author-badge__description"><?= $author_setup["description$currentLang"] ?></div>
                </article>
                <a href="<?= get_author_posts_url( $users_id ) ?>" class="author-badge__link"></a>
            </div>
        </section>
	<?php endif; ?>
</div>
