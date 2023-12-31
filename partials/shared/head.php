<?php
if (is_author()) {
    $author_id   = get_the_author_meta('ID');
    $meta_fields = get_field('meta_fields', "user_$author_id");
} elseif ( ! is_front_page() && is_home()) {
    $blog_page_id = get_option('page_for_posts');
    $meta_fields  = get_field('meta_fields', $blog_page_id);
} else {
    $meta_fields = get_field('meta_fields', $post->ID);
}
$image_info = wp_get_attachment_image_src($meta_fields['image'], 'full');

$is_enable_noindex = get_field('is_enable_noindex', $post->ID) ?? false;

if ( strpos( $_SERVER['REQUEST_URI'], '/mz/' ) !== false ) {
	$og_locale = "pt-MZ";
} elseif (strpos( $_SERVER['REQUEST_URI'], '/br/' ) !== false ) {
    $og_locale = "pt-BR";
} else {
    $og_locale = get_bloginfo('language') ?? 'en-US';
}

$post_title       = apply_filters('the_content', $meta_fields['title']);
$post_description = apply_filters('the_content', $meta_fields['description']);
$site_name        = get_field('site_name', 'options') ?? 'site';

if ($args['custom-header-data']) {
    $customHeaderData   = $args['custom-header-data'];
    $post_title         = $customHeaderData['title'];
    $canonicalUrl       = $customHeaderData['canonicalUrl'];
}
?>
<head>
    <meta charset="UTF-8">
    <?php
    if ($is_enable_noindex): ?>
        <meta name="robots" content="noindex">
    <?php
    endif ?>
    <meta name="viewport"
          content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $post_title ?></title>
    <meta name="description" content="<?= $post_description ?>">
    <meta property="og:locale" content="<?= $og_locale ?>">
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?= $post_title ?>">
    <meta property="og:description" content="<?= $post_description ?>">
    <meta property="og:site_name" content="<?= $site_name ?>">
    <meta property="og:image"
          content="<?= app_get_image_url($image_info['0']) ?>">
    <meta property="og:image:secure_url"
          content="<?= app_get_image_url($image_info[0]) ?>">
    <meta property="og:image:width" content="<?= $image_info[1] ?>">
    <meta property="og:image:height" content="<?= $image_info[2] ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="<?= $post_description ?>">
    <meta name="twitter:image"
          content="<?= app_get_image_url($image_info[0]) ?>">
    <?php
    $is_enable_page_hreflangs = get_field('is_enable_page_hreflangs', $post->ID);
    if ($is_enable_page_hreflangs) {
        $items = get_field('page_hreflangs', $post->ID);

        if (!empty($items)) {
            foreach ($items as $item): ?>
                <link rel="alternate" href="<?= $item['href'] ?>" hreflang="<?= $item['hreflang'] ?>">
            <?php endforeach;
        }
    }

    wp_head();
    app_get_partial('/shared/root-styles');
    app_get_partial('/ld-json/article');
    app_get_partial('/ld-json/organization');
    app_get_partial('/ld-json/review');
    echo get_field('head_metric', 'options');
    echo getInputHead();
    ?>
</head>
