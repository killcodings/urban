<?php the_content(); ?>
    <div class="page-update">
        <div class="container">
            <?php
            $update_date_pub     = get_the_modified_date('D, d M Y H:i:s');
            $update_date_local     = get_the_modified_time( 'c' );
            ?>
            <?= Translate::get('post_updated') ?>: <time datetime="<?= $update_date_local ?>"><?= $update_date_pub ?></time>
        </div>
    </div>
<?php
$is_enabled_author             = get_field( 'is_enabled_author', 'options' ) ?? false;
$is_disabled_author_page_setup = get_field( 'is_disabled_author' ) ?? false;
if ( $is_enabled_author && ! $is_disabled_author_page_setup ) {
	app_get_partial( 'shared/author-badge' );
}

$is_enable_app_links = get_field( 'enable_apps_links', 'options' ) ?? false;
if ( $is_enable_app_links ):
	$apps_links = app_get_page_by_template( 'app-page.php' );
	$apps_links_title = get_field('relative_apps_title', 'options');
	$priopity_app = get_field( 'apps_links_priority', 'options' );
	app_links($apps_links, $apps_links_title, $priopity_app);
endif;

$is_enable_review_links = get_field( 'enable_review_links', 'options' ) ?? false;
if ( $is_enable_review_links ):
	$apps_links = app_get_page_by_template( 'review-page.php' );
	$apps_links_title = get_field('review_links_title', 'options');
	$priopity_app = get_field( 'review_links_priority', 'options' );
	app_links($apps_links, $apps_links_title, $priopity_app);
endif;
