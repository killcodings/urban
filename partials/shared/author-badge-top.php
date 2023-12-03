<?php
$author_id    = $post->post_author;
$currentLang  = Translate::getLang();
$author_setup = get_field( 'user_setup', "user_$author_id" );
if ( $currentLang === 'en' ) {
	$currentLang = '';
} else {
	$currentLang = "_$currentLang";
}
?>

<div class="container">
    <section class="author-badge-top">
        <h2 class="author-badge-top__title"><?= Translate::get('post_author') ?></h2>
        <article class="author-badge-top__card">
            <div class="author-badge-top__avatar">
                <?= app_get_image( [ 'id' => $author_setup["avatar"] ], false,  $author_setup['alt']) ?>
            </div>
            <div class="author-badge-top__text">
                <h3 class="author-badge-top__name"><?= "{$author_setup["name$currentLang"]} {$author_setup["last_name$currentLang"]}" ?></h3>
                <div class="author-badge-top__description"><?= $author_setup["description$currentLang"] ?></div>
            </div>
            <a href="<?= get_author_posts_url( $author_id ) ?>" class="author-badge-top__link"></a>
        </article>
    </section>
</div>
