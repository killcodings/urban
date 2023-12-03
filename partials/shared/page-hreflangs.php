<?php

$items = $args['items'];

if ( ! empty($items)): ?>
    <nav class="flags-widget flags-widget__custom">
        <ul class="flags-widget__list">
            <?php foreach ($items as $item): ?>
                <li class="flags-widget__item">
                    <a href="<?= $item['href'] ?>" class="flags-widget__link">
                        <?php if ($item['icon']) { ?>
                            <img class="flags-widget__icon"
                                 src="<?= $item['icon'] ?>"
                                 alt="<?= $item['href'] ?>"
                                 width="22"
                                 height="12">
                        <?php } ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
<?php endif;
