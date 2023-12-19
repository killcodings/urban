<?php
$image = get_field( 'sect-pic-image' );
$sect_pic_logo = get_field('sect-pic-logo');
$sect_pic_logo_description = get_field('sect-pic-logo-description');
$is_border = get_field('is_border') ?? false;
$is_margin = get_field('is_margin') ?? false;
//$is_iframe = get_field('is_iframe') ?? false;
//$class = $is_iframe ? "image_iframe" : '';

$class = $is_border ? 'cg-sect-pic_border' : '';
$class .= $is_margin ? ' cg-sect-pic_margin' : '';

acf_block_before('Изображение', $is_preview); ?>
	<div class="cg-sect-pic <?=$class?>" style="--color: #D02E4B;">
        <?php
        echo app_get_image( [
            'id' => $image,
            'classes' => "image"
        ] );
        ?>
      <?php if ($sect_pic_logo) : ?>
      <div class="cg-logo-block cg-sect-pic__logo">
          <?= app_get_image( [
          'id' => $sect_pic_logo,
          'classes' => "cg-logo-block__logo-pic"
          ] ); ?>
        <div class="cg-logo-block__logo-text"><?= $sect_pic_logo_description ?></div>
      </div>
      <?php endif; ?>
    </div>
<?php
acf_block_after($is_preview);
