<?php
$title             = get_field( 'cg_faq_sec_title');
$description       = get_field('cg_faq_sect_description');
$text_items        = get_field( 'items' );
$is_enable_faq     = get_field( 'is_enable_faq' ) ?? false;
$items_tag         = get_field( 'items_tag' ) ?? 'details';
$current_microdata = get_field( 'current_microdata' );

$item_class = '';

if ( $is_enable_faq ) {
	$item_class .= ' cg-faq_faq';
}
if ( $items_tag === 'div' ) {
	$item_class .= ' cg-faq_div';
}

acf_block_before( 'FAQ', $is_preview ); ?>

<section class="cg-faq-sect cg-section__content">
    <h2><?= $title ?: 'FAQ' ?></h2>
    <?php if ($description) { ?>
        <div class="cg-description cg-faq-sect__description" style="--color: #344054; --max-width: 854px"><?= $description ?></div>
    <?php } ?>
    <div class="cg-faq-sect__cards">
        <?php
        foreach ( $text_items as $item ):
            $answer_id = 'answer-' . ( strlen( $item['text'] ) + strlen( $item['title'] ) );
            if ( $items_tag === 'details' ):
                $is_opened = get_field( 'is_opened' ) ? "open" : '';
                ?>
                <details class="cg-faq <?= $item_class ?>" <?= $is_opened ?>>
                    <summary class="cg-faq__title"><?= $item['title'] ?></summary>
                    <div class="cg-faq__info" id="<?= $answer_id ?>"><?= $item['text'] ?></div>
                </details>
            <?php elseif ( $items_tag === 'div' ):
                $is_opened = get_field( 'is_opened' ) ? $item_class .= ' cg-faq_open' : ''; ?>
                <article class="cg-faq <?= $item_class ?>">
                    <div class="cg-faq__title-block">
                        <h3 class="cg-faq__title" style="--color:#101828;"><?= $item['title'] ?></h3>
                    </div>
                    <div class="cg-faq__info" id="<?= $answer_id ?>"><?= $item['text'] ?></div>
                </article>
            <?php endif;
        endforeach; ?>
    </div>
</section>


<?php
$version = "v1";
//get_template_part("partials/acf-blocks/cg-faq-sect-$version", null, $args);


if ( $is_enable_faq ) {
	$data = [
		'@context'   => 'https://schema.org',
		'@type'      => '',
		'mainEntity' => []
	];

	if ( $current_microdata === 'faqs' ) {
		$data['@type'] = 'FAQPage';

		foreach ( $text_items as $text_item ) {
			$faq_arr[] = [
				'@type'          => 'Question',
				'name'           => $text_item['title'],
				'acceptedAnswer' => [
					'@type' => 'Answer',
					'text'  => strip_tags($text_item['text'])
				]
			];
		}
		$data['mainEntity'][] = $faq_arr;
	} elseif ( ( $current_microdata === 'qa' ) ) {
		$data['@type'] = 'QAPage';

		foreach ( $text_items as $item ) {
			$qa_arr[] = [
				'@type'          => 'Question',
				'name'           => $item['title'],
				'answerCount'    => '1',
				'upvoteCount'    => round( ( time() / 1000000 ) ),
				'acceptedAnswer' => [
					'@type'       => 'Answer',
					'text'        => strip_tags($item['text']),
					'upvoteCount' => round( ( time() / 1000000 ) / 2 ),
					'url'         => get_permalink() . '#answer-' . strlen( $item['text'] )
				]
			];
		}
		$data['mainEntity'][] = $qa_arr;
	}
	$json_arr = json_encode( app_array_filter_recursive( $data ), JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
	echo "<script type='application/ld+json'>" . $json_arr . "</script>";
}

acf_block_after( $is_preview );
