<?php
$blocks      = get_field( 'blocks' );
$title_level = get_field( 'title_level' ) ?: 'h3';
$columns     = get_field( 'columns' ) ?: 3;
$icon_position = get_field('icon_position') ?: 'middle';
$tag_block = get_field( 'tag_block' ) ?: 'article';

$block_style_string = "--columns:$columns;";
$block_class_string = "icon-block_$icon_position";
$icon_class_string = "icon-block__image_$icon_position";

acf_block_before( 'Блок с иконками', $is_preview );
?>
    <div class="icon-block <?= $block_class_string ?>" style="<?= $block_style_string ?>">
		<?php foreach ( $blocks as $block ): ?>
            <<?= $tag_block ?> class="icon-block__item">
                <div class="icon-block__image <?= $icon_class_string ?>"><?= app_get_image(['id' => $block['icon']]) ?></div>
                <<?= $title_level ?> class="icon-block__title"><?= $block['title'] ?></<?= $title_level ?>>
                <div class="icon-block__text"><?= $block['text'] ?></div>
            </<?= $tag_block ?>>
		<?php endforeach; ?>
    </div>
<?php acf_block_after( $is_preview );
