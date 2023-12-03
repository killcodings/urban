<?php

$termin = get_field("termin");

acf_block_before( 'Определения', $is_preview );
?> 
<dl class="terms-list">
    <?php foreach ($termin as $item): ?>
        <dt class="terms-list__item"><?= $item['value'] ?></dt>
        <?php foreach ($item['fields-group'] as $desc): ?>
            <dd class="terms-list__description"><?= $desc['description'] ?></dd>
        <?php endforeach; ?>
    <?php endforeach; ?>
</dl>
<?php
acf_block_after( $is_preview );