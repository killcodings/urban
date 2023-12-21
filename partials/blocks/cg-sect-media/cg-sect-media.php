<?php
$image = get_field( 'sect_media' );
$sect_pic_logo = get_field('sect_media_logo');
$sect_pic_logo_description = get_field('sect_media_logo_description');

$is_border = get_field('is_border') ?? false;
$is_margin = get_field('is_margin') ?? false;
$sect_media_color_border = get_field('sect_media_color_border') ?? '#D02E4B';
//$is_iframe = get_field('is_iframe') ?? false;
//$class = $is_iframe ? "image_iframe" : '';


$class = $is_border ? 'cg-sect-media_border' : '';
$class .= $is_margin ? ' cg-sect-media_margin' : '';


acf_block_before('Media', $is_preview); ?>
	<div class="cg-sect-media <?=$class?>" style="--borderColor: <?=$sect_media_color_border?>;">
        <?php
        echo app_get_image( [
            'id' => $image,
            'classes' => "image"
        ] );
        ?>
      <?php if ($sect_pic_logo) : ?>
      <div class="cg-logo-block cg-sect-media__logo">
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
