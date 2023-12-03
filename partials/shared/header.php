<?php

$header_panel_colors = get_field('header_panel_colors', 'options');

$page_header_class = 'page-header';

$is_logo_in_center = get_field('header_logotype_in_center', 'options') ?? false;
if ($is_logo_in_center) {
    $page_header_class .= ' page-header_logo-centered';
}

$mostbetbd_lang_link = false;
$url                 = (( ! empty($_SERVER['HTTPS'])) ? 'https' : 'http')
                       . '://' . $_SERVER['HTTP_HOST']
                       . $_SERVER['REQUEST_URI'];
if (strpos($url, 'mostbetbd.net') !== false) {
    $mostbetbd_lang_link = true;
    $href                = 'https://mostbetbr.net/';
}


$is_enable_banner          = get_field('is_enable_banner', 'options');
if ($is_enable_banner) :
    $banner_location = get_field('banner_location', 'options');
    if (in_array('header', $banner_location)) :
        $show_banner = is_enabled_banners('is_enable_banner', 'banner_pages');
        if ($show_banner) :
            $banner_desktop = get_field('banner', 'options')['desktop'];
            $banner_mobile = get_field('banner', 'options')['mobile'];
            ?>
            <aside class="header-banner">
                <?php
                if (isset($banner_desktop['link'])
                    && isset($banner_desktop['image'])
                ) : ?>
                    <a href="<?= $banner_desktop['link'] ?>"
                       class="header-banner__desktop">
                        <?= app_get_image(['id' => $banner_desktop['image']]) ?>
                    </a>
                <?php
                endif; ?>
                <?php
                if (isset($banner_mobile['link'])
                    && isset($banner_mobile['image'])
                ) : ?>
                    <a href="<?= $banner_mobile['link'] ?>"
                       class="header-banner__mobile">
                        <?= app_get_image(['id' => $banner_mobile['image']]) ?>
                    </a>
                <?php
                endif; ?>
            </aside>
        <?php
        endif;
    endif;
endif;

?>
<header class="<?= $page_header_class ?>">
    <div class="header-panel"
         style="--background-color: <?= $header_panel_colors['background']
             ?: '#000' ?>">
        <div class="container">
            <?php
            $header_logotype = get_field('header_logotype', 'options');

            if ($header_logotype):
                ?>
                <div class="header-panel__logo">
                    <?php
                    $alt_group = get_field('alt_group', 'options');
                    if ( strpos( $_SERVER['REQUEST_URI'], '/mz/' ) !== false ) { ?>
                        <a href="<?= home_url() ?>/mz/" title="Main page">
	                        <?= app_get_image( ['id' => $header_logotype],false, $alt_group['alt_mz'] ) ?>
                        </a>
                    <?php } elseif (strpos( $_SERVER['REQUEST_URI'], '/br/' ) !== false) { ?>
                        <a href="<?= home_url() ?>/br/" title="Main page">
		                    <?= app_get_image( ['id' => $header_logotype],false, $alt_group['alt_br'] ) ?>
                        </a>
                    <?php } else { ?>
                        <a href="<?= home_url() ?>" title="Main page">
                            <?= app_get_image(['id' => $header_logotype]) ?>
                        </a>
                    <?php } ?>

                </div>
            <?php
            endif;

            $primary_nav_buttons           = get_field(
                'primary_nav_buttons',
                'options'
            );
            $is_change_primary_nav_buttons = get_field(
                'is_change_header_button',
                $post->ID
            );
            $is_enabled_mobile_buttons = $primary_nav_buttons['is_enabled_mobile_buttons'] || $is_change_primary_nav_buttons;

            if ($is_enabled_mobile_buttons): ?>
                <div class="header-panel__buttons">
                    <?php
                    $mobile_buttons = $primary_nav_buttons['buttons'];
                    if ($is_change_primary_nav_buttons) {
                        $mobile_buttons = get_field('buttons', $post->ID);
                    }
                    foreach ($mobile_buttons as $button) {
                        $choose_link = $button['choose'];
                        if ($choose_link === 'input_link') {
                            $button['url'] = $button['input_link'];
                        } else {
                            $button['url'] = $button['primary_nav_buttons_choose_link'];
                        }

                        if ($button['style'] === 'outline') {
	                        $button_class = "header-panel__button site-button site-button_custom_color";
	                        $button_colors = [
		                        'background'       => $header_panel_colors['buttons_background'],
		                        'background_hover' => $header_panel_colors['buttons_background_hover'],
		                        'color'            => $header_panel_colors['buttons_color'],
		                        'color_hover'      => $header_panel_colors['buttons_color_hover'],
		                        'border'           => $header_panel_colors['buttons_border_color'],
		                        'border_hover'     => $header_panel_colors['buttons_border_color_hover'],
		                        'border_style'     => $header_panel_colors['buttons_border_style'],
		                        'border_radius'    => $header_panel_colors['buttons_border_radius']
	                        ];
                        } elseif ($button['style'] === 'gradient') {
	                        $button_class = "header-panel__button site-button site-button_gradient";
                        } elseif ($button['style'] === 'custom') {
	                        $button_class = "header-panel__button site-button site-button_custom_color";
	                        $button_colors = $button['buttons_setup'];
                        } else {
                            $button_class = "header-panel__button site-button site-button_outline";
                        }

                        echo app_get_button(
                            $button,
                            $button_class,
                            $button['relations'],
                            $button_colors
                        );
                    }
                    ?>
                </div>
            <?php
            endif; ?>
        </div>
    </div>
    <div class="container">
        <div class="page-header__block">
            <?php

            if (strpos($_SERVER['REQUEST_URI'], '/mz/') || strpos($_SERVER['REQUEST_URI'], '/mz/') === 0) {
	            wp_nav_menu([
		            'theme_location'  => 'primary_mz',
		            'fallback_cb'     => false,
		            'container'       => 'nav',
		            'container_class' => 'primary-nav',
		            'container_id'    => '',
		            'menu_class'      => 'primary-nav__list',
		            'menu_id'         => '',
		            'walker'          => new My_Walker_Nav_Menu()
	            ]);
            } elseif (strpos($_SERVER['REQUEST_URI'], '/br/') || strpos($_SERVER['REQUEST_URI'], '/br/') === 0) {
	            wp_nav_menu([
		            'theme_location'  => 'primary_br',
		            'fallback_cb'     => false,
		            'container'       => 'nav',
		            'container_class' => 'primary-nav',
		            'container_id'    => '',
		            'menu_class'      => 'primary-nav__list',
		            'menu_id'         => '',
		            'walker'          => new My_Walker_Nav_Menu()
	            ]);
            } else {
	            wp_nav_menu([
		            'theme_location'  => 'primary',
		            'fallback_cb'     => false,
		            'container'       => 'nav',
		            'container_class' => 'primary-nav',
		            'container_id'    => '',
		            'menu_class'      => 'primary-nav__list',
		            'menu_id'         => '',
		            'walker'          => new My_Walker_Nav_Menu()
	            ]);
            }

            dynamic_sidebar('language-flags');

            if ($is_enabled_mobile_buttons):
	            $is_header_mobile_custom_colors = $primary_nav_buttons['header-mobile-buttons_bool'];
	            $header_mobile_buttons_custom_colors = null;
	            if ($is_header_mobile_custom_colors) {
		            $header_mobile_buttons_group = $primary_nav_buttons['header-mobile-buttons_group'];
		            $header_mobile_buttons_custom_colors = [
			            'background'       => $header_mobile_buttons_group['header_mobile_buttons_bg'],
			            'color'            => $header_mobile_buttons_group['header_mobile_buttons_color'],
			            'border'           => $header_mobile_buttons_group['header_mobile_buttons_border'],
		            ];
	            }
                ?>
                <div class="page-header__mobile-buttons header-mobile-buttons">
                    <?php
                    $mobile_buttons = $primary_nav_buttons['buttons'];
                    foreach ($mobile_buttons as $button) {
                        $choose_link = $button['choose'];
                        if ($choose_link === 'input_link') {
                            $button['url'] = $button['input_link'];
                        } else {
                            $button['url']
                                = $button['primary_nav_buttons_choose_link'];
                        }
                        $button_style = $button['style'] ?: 'outline';
	                    $button_class
		                    = "header-mobile-buttons__button site-button_$button_style";
                        if ($is_header_mobile_custom_colors) {
                            $button_style = 'custom_color';
	                        $button_class
		                        = "header-mobile-buttons__button site-button_$button_style";
                        }
                        echo app_get_button(
                            $button,
                            $button_class,
                            $button['relations'],
	                        $header_mobile_buttons_custom_colors
                        );
                    }
                    ?>
                </div>
            <?php
            endif;
            if (has_nav_menu('primary')): ?>
                <div class="page-header__burger burger">
                    <span></span><span></span><span></span>
                </div>
            <?php
            endif; ?>
            <?php
            if ($mostbetbd_lang_link) :
                if (strpos($url, 'mostbetbd.net/bn/') !== false) { ?>
                    <div class="widget-language-link">
                        <a class="widget-language-link__item"
                           href="https://mostbetbd.net">
                            <img class="wpml-ls-flag"
                                 src="../wp-content/plugins/sitepress-multilingual-cms/res/flags/en.png"
                                 alt="English">
                        </a>
                        <a class="widget-language-link__item"
                           href="<?= $href ?>">
                            <img
                                src="../wp-content/plugins/sitepress-multilingual-cms/res/flags/pt-br.png"
                                alt="Português">
                        </a>
                    </div>
                    <?php
                } else { ?>
                    <div class="widget-language-link">
                        <a class="widget-language-link__item"
                           href="https://mostbetbd.net/bn/">
                            <img class="wpml-ls-flag"
                                 src="../wp-content/plugins/sitepress-multilingual-cms/res/flags/bn.png"
                                 alt="বাংলাদেশ">
                        </a>
                        <a class="widget-language-link__item"
                           href="<?= $href ?>">
                            <img
                                src="../wp-content/plugins/sitepress-multilingual-cms/res/flags/pt-br.png"
                                alt="Português">
                        </a>
                    </div>
                    <?php
                } ?>
            <?php
            endif; ?>
        </div>
    </div>

    <?php
    $is_header_bonus      = get_field('is_header_bonus', 'options');
    $is_header_bonus_page = get_field('is_header_bonus', $post->ID);
    if ($is_header_bonus || $is_header_bonus_page):
        $settings = $is_header_bonus_page
            ?
            get_field('settings', $post->ID)
            :
            get_field('settings', 'options');

        if ($settings['link']) {
            get_template_part(
                "theme-parts/components/header-bonus",
                null,
                $settings
            );
        }
    endif; ?>
</header>
