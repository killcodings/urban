<?php

$count_reviews           = get_field( 'count' );
//$comment_title_language  = $comment_title ?? Translate::get( 'comments' );
global $post;

acf_block_before( 'Отзывы', $is_preview );

$comments_list = get_comments( [
	"status"       => 'approve',
	'parent'       => 0,
	'post_id'      => $post->ID,
	'hierarchical' => 'threaded',
	'type' => 'reviews',
	'number'       => $count_reviews
] );
if ( $comments_list ):?>

	<div class="reviews">
		<div class="average-ratings">
			<?php
			function average_ratings ($count = false) {
				global $post;
				$count_reviews = get_field( 'count' );
				$comments_list = get_comments( [
					"status"       => 'approve',
					'parent'       => 0,
					'post_id'      => $post->ID,
					'hierarchical' => 'threaded',
					'type' => 'reviews',
					'number'       => $count_reviews
				] );
				$i     = 0;
				$total = 0;

				foreach ( $comments_list as $key => $comment ) {
					$comment_id = $comment->comment_ID;
					$rate = get_comment_meta( $comment_id, 'rating', true );
					$i ++;
					if ( isset( $rate ) && '' !== $rate ) {
						$total += $rate;
					}
				}
				if ($count) {
					return  $i ;
				}
				return round( $total / $i ) ;
			}
			?>
			<div class="average-ratings__value"><?php echo average_ratings(true) ?></div>
			<span class="rating-container">
                <span class="rating-count"><?php echo average_ratings() ?></span>
                <?php
                $rating = average_ratings();
                $stars_rating    = '';
                $stars_no_rating = '';
                $class           = '';

                for ( $i = 1; $i <= 5 - $rating; $i ++ ) {
	                $stars_no_rating = "<span class='dashicons dashicons-star-filled'></span>";
	                echo $stars_no_rating;
                }
                for ( $j = 1; $j <= $rating; $j ++ ) {
	                $class        = 'rating-value';
	                $stars_rating = "<span class='dashicons $class dashicons-star-filled'></span>";
	                echo $stars_rating;
                }
                ?>
            </span>
		</div>



		<div class="reviews-swiper native-slider">
			<div class="reviews-swiper-wrapper">
				<?php
				$i = 0;
				foreach ( $comments_list as $comment ):
					$comment_approved     = $comment->comment_approved;
					$comment_this_post    = $comment->comment_post_ID === $post->ID;
					$comment_author       = $comment->comment_author;
					$comment_author_email = $comment->comment_author_email;
					$comment_content      = $comment->comment_content;
					$comment_date         = $comment->comment_date;
					$comment_id           = $comment->comment_ID;
					$comment_ref_date     = get_comment_date( 'd.m.Y', $comment_id ) . ' at ' . get_comment_date( 'H:i', $comment_id );

					if ( true ): ?>
						<article class="review-slide slide" id="<?= $comment_id ?>">
							<div class="review-slide__header">
								<div class="review-slide__info">
									<div class="review-slide__avatar comment__avatar"><i class="icon-user"></i></div>
									<div class="review-slide__author"><?= $comment_author ?></div>
									<span class="review-slide__date">
                                <time datetime="<?= $comment_date ?>" data-val="<?= $comment_ref_date ?>">
                                    <?= $comment_date ?>
                                </time>
                            </span>
								</div>
								<div class="review-slide__rating">
                            <span class="rating-container">
                                <?php
                                $rating_value = get_comment_meta($comment_id, 'rating', true) ?: 1;
                                $reviews_rating_percent = $rating_value * 20;
                                ?>
                                <span class="rating-count"><?=$rating_value?></span>
                                <span class="dashicons dashicons-star-filled" style="--rating:<?=$reviews_rating_percent.'%'?>"></span>

                            </span>
								</div>
							</div>
							<div class="review-slide__main">
								<?= $comment_content ?>
							</div>
						</article>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<div class="native-slider__buttons">
				<div id="rightslide" class="dashicons dashicons-arrow-left-alt2 native-slider__prev"></div>
				<div id="leftslide" class="dashicons dashicons-arrow-right-alt2 native-slider__next"></div>
			</div>
		</div>
		<a href="#comments" class="reviews__link">Leave your feedback</a>
	</div>
<?php endif;
acf_block_after( $is_preview );