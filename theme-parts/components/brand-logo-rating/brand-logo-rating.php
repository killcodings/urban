<?php
/*
 * size
 * color
 * image
 * name
 * rating
 * tag
 */
$size          = $args['size'];
$tag           = $args['tag'] ?? 'p'; // ¯\_(ツ)_/¯
$wrapper_class = match ( $size ) {
	'large' => 'brand-logo-rating_large',
	'medium' => 'brand-logo-rating_medium',
	'small' => 'brand-logo-rating_small',
	'responsive' => 'brand-logo-rating_responsive',
};
?>
<div class="brand-logo-rating <?= $wrapper_class ?>">
    <div class="brand-logo-rating__logo" style="--site-color: <?= $args['color'] ?>">
		<?= app_get_image( [ 'id' => $args['image'] ] ) ?>
    </div>
    <div class="brand-logo-rating__content">
        <<?= $tag ?> class="brand-logo-rating__name">
            <?= $args['name'] ?>
        </<?= $tag ?>>
        <p class="brand-logo-rating__subtitle">CBG Rating</p>
        <div class="brand-logo-rating__stars">
            <span class="brand-logo-rating__value"><?= $args['rating'] ?></span>
            <span class="brand-logo-rating__icons" style="--rating: <?= $args['rating'] * 20 ?>%">
                ★★★★★
            </span>
        </div>
    </div>
</div>
