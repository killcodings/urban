<?php

$text_items        = get_field('items');
$is_enable_faq     = get_field('is_enable_faq') ?? false;
$items_tag         = get_field('items_tag') ?? 'details';
$current_microdata = get_field('current_microdata');

$item_class    = 'hidden-text';

if ($is_enable_faq) {
	$item_class .= ' hidden-text_faq';
}
if ($items_tag === 'div') {
	$item_class .= ' hidden-text_div';
}


acf_block_before( 'Скрытый текст (FAQ)', $is_preview );

foreach ( $text_items as $key => $item ) {
	$arr_all[] = strlen( $item['text'] ) + strlen( $item['title'] );
}

$arr_init = $arr_all;
$arr_duplicate = [];
$arr_duplicate_key = [];
$arr_unique = [];

foreach ($arr_init as $key => $item) {
	if (isset($arr_unique[$item])) {
		$arr_duplicate[] = $item;
		$arr_duplicate_key[] = $key;
	} else {
		$arr_unique[$item] = true;
	}
}

foreach ( $text_items as $key => $item ):
	$answer_id = 'answer-' . ( strlen( $item['text'] ) + strlen( $item['title'] ) );
    if ( in_array($key, $arr_duplicate_key) ) {
	    $answer_id = 'answer-duplicate' . ( strlen( $item['text'] ) + strlen( $item['title'] ) );
    }
	if ( $items_tag === 'details' ):
		$is_opened = get_field( 'is_opened' ) ? "open" : '';
		?>
        <details class="<?= $item_class ?>" <?= $is_opened ?>>
            <summary class="hidden-text__title"><?= $item['title'] ?></summary>
            <div class="hidden-text__content"
                 id="<?= $answer_id ?>"><?= $item['text'] ?></div>
        </details>
	<?php
    elseif ($items_tag === 'div'):
		$is_opened = get_field('is_opened') ? $item_class .= ' hidden-text_open'
			: ''; ?>
        <div class="<?= $item_class ?>">
            <h3 class="hidden-text__title"><?= $item['title'] ?></h3>
            <div class="hidden-text__content"
                 id="<?= $answer_id ?>"><?= $item['text'] ?></div>
        </div>
	<?php
	endif;
endforeach;
             
if ($is_enable_faq) {
	$data = [
		'@context'   => 'https://schema.org',
		'@type'      => '',
		'mainEntity' => []
	];

	if ($current_microdata === 'faqs') {
		$data['@type'] = 'FAQPage';

		foreach ($text_items as $text_item) {
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
	} elseif (($current_microdata === 'qa')) {
		$data['@type'] = 'QAPage';
		$text_first_word = explode(' ', trim($item['text']))[2];

		foreach ($text_items as $item) {
			$qa_arr[] = [
				'@type'          => 'Question',
				'name'           => $item['title'],
				'answerCount'    => '1',
				'upvoteCount'    => round((time() / 1000000)),
				'acceptedAnswer' => [
					'@type'       => 'Answer',
					'text'        => strip_tags($item['text']),
					'upvoteCount' => round((time() / 1000000) / 2),
					'url'         => get_permalink() . '#answer-' . $text_first_word
				]
			];
		}
		$data['mainEntity'][] = $qa_arr;
	}
	$json_arr = json_encode(
		app_array_filter_recursive($data),
		JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
	);
	echo "<script type='application/ld+json'>" . $json_arr . "</script>";
}

acf_block_after($is_preview);
