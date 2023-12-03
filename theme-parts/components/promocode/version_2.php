<?php
$class = '';
$style = '';
if ($args['is_custom_color']) {
	$color_promocode = $args['color_promocode'] ?? '#000';
	$class = ' custom-color';
    $style = "style='--color-promocode:$color_promocode'";
}

?>
<div class="promocode-block version_2<?= $class ?>" <?=$style?>>
<?php
    echo get_component( "welcome-bonus/welcome-bonus", $args );
    echo get_component( "promocode/promocode-copy", $args );
?>
</div>
