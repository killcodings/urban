<?php
$is_enable_mailcollector = get_field( 'is_enable_mailcollector', 'options' ) ?? false;
$comment_title           = get_field( 'comment_title');
$comment_title_language  = $comment_title ? $comment_title : Translate::get('comments');

$is_rating = get_field('is_rating', $post->ID) ?? false;
$is_reviews = get_field('is_reviews', $post->ID) ?? false;

$class = $is_rating ? ' feedback' : '';

if ($is_reviews) {
	$is_rating = false;
	$class = ' reviews';
}


if ( $is_enable_mailcollector ):
	$title = get_field( 'mailcollector_title', 'options' ) ?: 'Contact Us';
	$brand = get_field( 'mailcollector_brand', 'options' );
	render_feedback_form( $title, $brand, true, $post->ID );
    app_get_comment_list($post);

else:
	?>

    <footer class="comments-container" id="comments">
        <section class="container<?=$class?>">
            <h2 class="comment-form__title"><?= $comment_title_language ?></h2>
            <div class="comment-form">
	            <?php if ($is_reviews) {
		            $tabs =
			            [
				            0 => [ 'name' => 'Comments' ],
				            1 => [ 'name' => 'Feedback' ]
			            ];
                    ?>
                    <div class="tabs-control">
                        <?php foreach ( $tabs as $index => $tab ):
                            $class = $index ? "tabs-control__item" :
                                "tabs-control__item tabs-control__item_active";
                            ?>
                            <button type="button" data-tab="<?= $index ?>" class="<?= $class ?>"><?= $tab['name'] ?></button>
                        <?php endforeach; ?>
                    </div>
                <?php } ?>
                <form class="comment-form__form">
	                <?php if ($is_reviews) { ?>
                        <div class="review-rating">
                            <fieldset class="rating">
                              <span class="rating-container">
                                   <?php for ( $i = 5; $i >= 1; $i-- ) : ?>
                                       <input type="radio" id="rating-<?php echo esc_attr( $i ); ?>" name="rating"
                                              <?php if ($i == 5 ) { ?>
                                                  checked
                                              <?php } ?>
                                              value="<?php echo esc_attr( $i ); ?>" />
                                       <label for="rating-<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></label>
                                   <?php endfor; ?>
                                   <input type="radio" id="rating-0" class="star-cb-clear" name="rating" value="0" /><label for="rating-0">0</label>
                              </span>
                            </fieldset>
                        </div>
	                <?php } ?>
                    <input class="comment-form__input comment-form__field" name="name" type="text"
                           aria-label="<?= Translate::get('placeholder_name') ?>"
                           placeholder="<?= Translate::get('placeholder_name') ?>">
                    <input class="comment-form__input comment-form__field" name="email" type="email" aria-label="<?= Translate::get('placeholder_email') ?>"
                           placeholder="<?= Translate::get('placeholder_email') ?>">

                    <?php if ($is_rating) { ?>
                    <div class="feedback-form">
                        <div class="feedback-form__review">
                            <div class="feedback-form__review-title"><?= Translate::get('feedback-form__review-title') ?></div>
                            <input class="feedback-form__input comment-form__field" name="subtitle" type="text"
                                   aria-label="<?= Translate::get('feedback-form__review-subtitle') ?>"
                                   placeholder="<?= Translate::get('feedback-form__review-subtitle') ?>">
                        </div>
                        <fieldset class="rating">
                          <span class="rating-container">
                               <?php for ( $i = 5; $i >= 1; $i-- ) : ?>
                                   <input type="radio" id="rating-<?php echo esc_attr( $i ); ?>" name="rating" value="<?php echo esc_attr( $i ); ?>" /><label for="rating-<?php echo esc_attr( $i ); ?>"><?php echo esc_html( $i ); ?></label>
                               <?php endfor; ?>
                               <input type="radio" id="rating-0" class="star-cb-clear" name="rating" value="0" /><label for="rating-0">0</label>
                          </span>
                        </fieldset>
                    </div>
                    <?php } ?>

                    <textarea class="comment-form__textarea comment-form__field" name="comment"
                              placeholder="<?= Translate::get('placeholder_comment') ?>"
                              aria-label="<?= Translate::get('placeholder_comment') ?>"></textarea>
                    <input type="hidden" name="post_ID" value="<?= $post->ID ?>">

                    <?php if ($is_rating) { ?>
                        <button type="button" class="site-button site-button_gradient feedback-form__button"><?= Translate::get('comment_button') ?></button>
                    <?php } else { ?>
                        <button type="button" class="site-button site-button_gradient comment-form__button"><?= Translate::get('comment_button') ?></button>
                    <?php } ?>
                <span class="comment-form__alert"></span>
                </form>
            </div>
			<?php app_get_comment_list( $post, $is_rating); ?>
        </section>
    </footer>
<?php endif;
