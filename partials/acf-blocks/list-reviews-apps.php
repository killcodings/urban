<?php

$choose_reviews_relationship = get_field( 'choose_reviews_relationship' );
$choose_apps_relationship = get_field( 'choose_apps_relationship' );
$text_btn = get_field('text_btn');
$bg_btn = get_field('bg_btn');

$isDisplayApps = get_field('is_display_apps') ?? false;

if ($isDisplayApps) {
	$pages = $choose_apps_relationship;
	$title      = $text_btn ?: 'Download';
} else {
	$pages = $choose_reviews_relationship;
	$title          = $text_btn ?: 'Visit';
}

acf_block_before( 'List Reviews/Apps', $is_preview ); ?>
	<div class="app-site_list_wrapper">
		<ol class="app-site_list">
			<?php
			foreach ( $pages as $index => $page ):
                $number         = ++$index;
				$bonus_id       = $page;
				$brand_setup_group = get_field('brand_setup', $bonus_id);
				$page_link      = get_page_link($bonus_id);
				$site_logo      = $brand_setup_group['icon'];
				$site_color     = $brand_setup_group['icon_background'] ?: '#ccc';
				$site_name      = $brand_setup_group['name']; get_field( 'site_name', $bonus_id );
				$site_bonus     = $brand_setup_group['bonus']; get_field( 'site_bonus', $bonus_id );

				switch ( $brand_setup_group['choose_link'] ):
					case 'input_link':
						$site_link = $brand_setup_group['input_link'];
						break;
					default:
						$site_link = $brand_setup_group['brand_setup_choose_link'];
				endswitch;
                ?>

				<li class="app-site_list__item" style="--site-color: <?= $site_color ?>;--buttons-background:<?=$bg_btn?>">
                    <div class="app-site_list__icon-block">
                        <span class="app-site_list__number"><?= $number ?></span>
                        <div class="app-site_list__logo">
                            <?= app_get_image( [ 'id' => $site_logo ] ); ?>
                        </div>
                    </div>
					<div class="app-site_list__content">
						<a href="<?= $page_link ?>" class="app-site_list__name">
							<p>
								<b><?= $site_name ?></b>
							</p>
						</a>
						<div class="welcome-bonus">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.06 1.93C7.17 1.92 5.33 3.74 6.17 6H3C2.46957 6 1.96086 6.21071 1.58579 6.58579C1.21071 6.96086 1 7.46957 1 8V10C1 10.2652 1.10536 10.5196 1.29289 10.7071C1.48043 10.8946 1.73478 11 2 11H11V8H13V11H22C22.2652 11 22.5196 10.8946 22.7071 10.7071C22.8946 10.5196 23 10.2652 23 10V8C23 7.46957 22.7893 6.96086 22.4142 6.58579C22.0391 6.21071 21.5304 6 21 6H17.83C19 2.73 14.6 0.419999 12.57 3.24L12 4L11.43 3.22C10.8 2.33 9.93 1.94 9.06 1.93ZM9 4C9.89 4 10.34 5.08 9.71 5.71C9.08 6.34 8 5.89 8 5C8 4.73478 8.10536 4.48043 8.29289 4.29289C8.48043 4.10536 8.73478 4 9 4ZM15 4C15.89 4 16.34 5.08 15.71 5.71C15.08 6.34 14 5.89 14 5C14 4.73478 14.1054 4.48043 14.2929 4.29289C14.4804 4.10536 14.7348 4 15 4ZM2 12V20C2 20.5304 2.21071 21.0391 2.58579 21.4142C2.96086 21.7893 3.46957 22 4 22H20C20.5304 22 21.0391 21.7893 21.4142 21.4142C21.7893 21.0391 22 20.5304 22 20V12H13V20H11V12H2Z" fill="<?= $site_color ?: '#ccc'?>"></path>
                            </svg>
                            <?= strip_tags($site_bonus)?></div>
					</div>
					<?= app_get_button( ['url' => $site_link,'title' => $title ], 'app-site_list__button site-button_outline'); ?>
				</li>
			<?php
			endforeach;
			?>
		</ol>
	</div>
<?php acf_block_after( $is_preview );
