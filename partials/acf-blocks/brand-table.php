<?php
$table_setup                = get_field( 'table_setup' );
$brand_setup                = $table_setup['brand_setup'];
$is_enable_brand_title_link = $table_setup['enable_brand_title_link'] ?? false;
$partner_link_title         = $table_setup['partner_link_title'] ?: 'Download';
$table_items                = get_field( $brand_setup );
$simple_table               = $table_setup['is_simple_table'] ?? false;
$table_arr                  = [];

if ( $brand_setup === 'custom' ) {
	foreach ( $table_items['brands'] as $index => $item ) {
		$table_item['icon']            = $item['icon'];
		$table_item['icon_background'] = $item['icon_background'] ?: 'none';
		$table_item['page_link']       = $item['page_link'] ?: false;
		$table_item['name']            = $item['name'];
		$table_item['rating']          = $item['rating'];
		$table_item['bonus']           = $item['bonus'];
		$table_item['cons']            = $item['cons'];
		$table_item['alt']             = $item['alt'];
		if ( $item['choose_link'] === 'input_link' ) {
			$button_url = $item['input_link'];
		} else {
			$button_url = $item['custom_table_setup_choose_link'];
		}
		$button                     = app_get_button( [
			'url'   => $button_url,
			'title' => $partner_link_title
		], 'site-button_outline', $item['link_relations'] );
		$table_item['partner_link'] = $button ?? false;
		$table_item['counter']      = $index + 1;
		$table_arr[]                = $table_item;
	}
} else {
	if ( $brand_setup === 'choose_posts' ) {
		$chosen_brands       = get_field( 'choose_posts' );
		$chosen_brands_pages = $chosen_brands['posts'];
        $is_promocode = $chosen_brands['is_promocode'];
        $is_benefits_text = $chosen_brands['is_benefits_text'];

	} elseif ( $brand_setup === 'global' ) {
		$brand_table_global_setup = get_field( 'brand_table_global_setup', 'options' );
		$chosen_brands_pages      = $brand_table_global_setup['posts'];
	}
	if ( $chosen_brands_pages ) {
		foreach ( $chosen_brands_pages as $index => $brand_page_id ) {
			$brand_setup                   = get_field( 'brand_setup', $brand_page_id );
			$table_item['icon']            = $brand_setup['icon'];
			$table_item['icon_background'] = $brand_setup['icon_background'] ?: 'none';
			$table_item['page_link']       = get_permalink( $brand_page_id );
			$table_item['name']            = $brand_setup['name'];
			$table_item['rating']          = $brand_setup['rating'];
			$table_item['bonus']           = $brand_setup['bonus'];
			$table_item['promocode']       = $brand_setup['promocode'];
			$table_item['cons']            = $brand_setup['cons'];
			$table_item['benefits_text']   = $brand_setup['benefits_text'];
			$table_item['alt']             = $brand_setup['alt'];


			if ( $brand_setup['choose_link'] === 'input_link' ) {
				$button_url = $brand_setup['input_link'];
			} else {
				$button_url = $brand_setup['brand_setup_choose_link'];
			}
			$button                     = app_get_button(
				[ 'url' => $button_url, 'title' => $partner_link_title ],
				'site-button_outline',
				$brand_setup['link_relations']
			);
			$table_item['partner_link'] = $button;
			$table_item['counter']      = $index + 1;
			$table_arr[]                = $table_item;
		}
	}
}

acf_block_before( 'Таблица брендов', $is_preview );

if ( !$simple_table ): ?>
    <table class="brand-table">
        <thead class="brand-table__thead">
        <tr>
            <th class="brand-table__icon-block-th">Rank</th>
            <th class="brand-table__content-th">Name</th>
            <th class="brand-table__bonus-th">Bonus</th>
            <th class="brand-table__lists-th">Benefits</th>
            <th class="brand-table__button-th">Link</th>
        </tr>
        </thead>
        <tbody class="brand-table__body">
		<?php foreach ( $table_arr as $item ): ?>
            <tr class="brand-table__item">
                <td class="brand-table__icon-block"
                    style="--table-icon-background-color:<?= $item['icon_background'] ?>">
                    <span class="brand-table__number">№<?= $item['counter'] ?></span>
                    <div class="brand-table__icon">
						<?= app_get_image( [ 'id' => $item['icon'] ],false, $item['alt'] ) ?>
                    </div>
                </td>
                <td class="brand-table__content">
					<?php if ( $is_enable_brand_title_link && $item['page_link'] ): ?>
                        <a href="<?= $item['page_link'] ?>" class="brand-table__page-link"><?= $item['name'] ?></a>
					<?php else: ?>
                        <span class="brand-table__page-link"><?= $item['name'] ?></span>
					<?php endif; ?>
                    <div class="brand-table__rating table-rating">
                        <span class="table-rating__value"><?= $item['rating'] ?></span>
                        <span class="table-rating__stars" style="--rating: <?= $item['rating'] ?>">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                    </div>
                </td>
                <td class="brand-table__bonus">
                    <div class="welcome-bonus">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.06 1.93C7.17 1.92 5.33 3.74 6.17 6H3C2.46957 6 1.96086 6.21071 1.58579 6.58579C1.21071 6.96086 1 7.46957 1 8V10C1 10.2652 1.10536 10.5196 1.29289 10.7071C1.48043 10.8946 1.73478 11 2 11H11V8H13V11H22C22.2652 11 22.5196 10.8946 22.7071 10.7071C22.8946 10.5196 23 10.2652 23 10V8C23 7.46957 22.7893 6.96086 22.4142 6.58579C22.0391 6.21071 21.5304 6 21 6H17.83C19 2.73 14.6 0.419999 12.57 3.24L12 4L11.43 3.22C10.8 2.33 9.93 1.94 9.06 1.93ZM9 4C9.89 4 10.34 5.08 9.71 5.71C9.08 6.34 8 5.89 8 5C8 4.73478 8.10536 4.48043 8.29289 4.29289C8.48043 4.10536 8.73478 4 9 4ZM15 4C15.89 4 16.34 5.08 15.71 5.71C15.08 6.34 14 5.89 14 5C14 4.73478 14.1054 4.48043 14.2929 4.29289C14.4804 4.10536 14.7348 4 15 4ZM2 12V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H20C20.5304 22 21.0391 21.7893 21.4142 21.4142C21.7893 21.0391 22 20.5304 22 20V12H13V20H11V12H2Z" fill="var(--brand-table-border-bonus)"/>
                        </svg>
                        <?= $item['bonus'] ?>
                    </div>
                    <?php if ($is_promocode && $item['promocode']) : ?>
                    <div class="promocode copy-click-button" data-copy="<?= $item['promocode'] ?>">
                        <span class="promocode__value"><?= $item['promocode'] ?></span>
                        <svg class="promocode__icon-copy" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M6 11C6 8.172 6 6.757 6.879 5.879C7.757 5 9.172 5 12 5H15C17.828 5 19.243 5 20.121 5.879C21 6.757 21 8.172 21 11V16C21 18.828 21 20.243 20.121 21.121C19.243 22 17.828 22 15 22H12C9.172 22 7.757 22 6.879 21.121C6 20.243 6 18.828 6 16V11Z" stroke="var(--brand-table-border-bonus)" stroke-width="1.5"/>
                            <path d="M6 19C5.20435 19 4.44129 18.6839 3.87868 18.1213C3.31607 17.5587 3 16.7956 3 16V10C3 6.229 3 4.343 4.172 3.172C5.343 2 7.229 2 11 2H15C15.7956 2 16.5587 2.31607 17.1213 2.87868C17.6839 3.44129 18 4.20435 18 5" stroke="var(--brand-table-border-bonus)" stroke-width="1.5"/>
                        </svg>
                    </div>
                    <?php endif; ?>
                </td>
				<?php if ( $item['cons'] ): ?>
                    <td class="brand-table__lists">
	                    <?php if ($is_benefits_text && $item['benefits_text']) : ?>
		                    <?= $item['benefits_text'] ?>
                        <?php else : ?>
                            <ul class="pros-list">
			                    <?php foreach ( $item['cons'] as $con ):
				                    $pros_list_label_color = $con['bg_item'] ?? false;
				                    $pros_list_label_color_style = '';
				                    if ($pros_list_label_color) {
					                    $pros_list_label_color_style = "style=--pros-list-label-color:$pros_list_label_color";
				                    }
				                    ?>
                                    <li class="pros-list__item" <?= $pros_list_label_color_style ?>><?= $con['item'] ?></li>
			                    <?php endforeach; ?>
                            </ul>
	                    <?php endif; ?>
                    </td>
				<?php endif;
				if ( $item['partner_link'] ): ?>
                    <td class="brand-table__button">
						<?= $item['partner_link'] ?>
                    </td>
	            <?php else: ?>
                    <td></td>
				<?php endif; ?>
            </tr>
		<?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <table class="simple-brand-table">
        <thead class="simple-brand-table__thead">
        <tr>
            <th>Rank</th>
            <th>Icon</th>
            <th>Name</th>
            <th>Bonus</th>
            <th>Link</th>
        </tr>
        </thead>
        <tbody class="simple-brand-table__body">
		<?php foreach ( $table_arr as $item ): ?>
            <tr class="simple-brand-table__item">
                <td class="simple-brand-table__counter"><?= $item['counter'] ?></td>
                <td class="simple-brand-table__icon">
                    <div class="simple-brand-table__icon-image">
		                <?= app_get_image( [ 'id' => $item['icon'] ], false, $item['alt'] ) ?>
                    </div>
                </td>
                <td class="simple-brand-table__name">
					<?php if ( $is_enable_brand_title_link && $item['page_link'] ): ?>
                        <a href="<?= $item['page_link'] ?>" class="simple-brand-table__page-link"><?= $item['name'] ?></a>
					<?php else: ?>
                        <span class="simple-brand-table__page-link"><?= $item['name'] ?></span>
					<?php endif; ?>
                </td>
                <td class="simple-brand-table__bonus"><?= $item['bonus'] ?></td>
				<?php if ( $item['partner_link'] ): ?>
                    <td class="simple-brand-table__button">
						<?= $item['partner_link'] ?>
                    </td>
				<?php endif; ?>
            </tr>
		<?php endforeach; ?>
        </tbody>
    </table>
<?php
endif;
acf_block_after( $is_preview );
