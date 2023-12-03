<?php

$reviews_rating_heading = get_field('reviews-rating-heading') ?? 5;
$labels_group = get_field('labels');
$reviews_rating_total = get_field('reviews-rating-total') ?? 100;
$count = count( $labels_group);
$reviews_rating_percent = $reviews_rating_heading * 20;


acf_block_before( 'Статистика рейтинга', $is_preview );
?>
    <div class="reviews-rating">
        <div class="reviews-rating__header">
            <h2 class="reviews-rating__heading">Reviews
                <span class="dashicons rating-value dashicons-star-filled" style="--rating:<?=$reviews_rating_percent.'%'?>"></span>
                <span class="reviews-rating__heading-value"><?= $reviews_rating_heading ?></span>
            </h2>
            <p class="reviews-rating__total"><?= $reviews_rating_total ?> total</p>
        </div>
        <div class="labels" data-some-selected="false">
            <?php for($i = $count; $i >= 1; $i--) : ?>
                <div class="label">
                    <div class="label__cell">
                        <input id="star-filter-page-filter-<?=$i?>" disabled="disabled" type="checkbox" class="checkbox">
                    </div>
                    <p class="label__cell label__cell-text"><?=$i?>-star</p>
                    <div class="label__cell label__cell-bar">
                        <div class="label__bar">
                            <span class="label__bar-value" style="width: <?= ${"label_bar_value_{$i}"} = $labels_group['label-bar-value-'.$i.''] ?? '50%'?>%; min-width: 12px;"></span>
                        </div>
                    </div>
                    <p class="label__cell" data-rating-distribution-row-percentage-typography="true"><?= ${"label_bar_value_{$i}"} = $labels_group['label-bar-value-'.$i.''] ?? '50%'?>%</p>
                </div>
            <?php endfor; ?>
        </div>
    </div>

<?php
acf_block_after( $is_preview );