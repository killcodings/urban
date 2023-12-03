<?php


require_once 'helpers/language_things.php';
require_once 'helpers/acf.php';
require_once 'helpers/acf-copy-select.php';
require_once 'helpers/ajax-comments.php';
require_once 'helpers/ajax_feedbacks.php';
require_once 'helpers/ajax_popup.php';
require_once 'helpers/ajax_slide_panel.php';

require_once 'helpers/ajax_reviews.php';
require_once 'helpers/assets.php';
require_once 'helpers/filters.php';
require_once 'helpers/breadcrumbs.php';
require_once 'helpers/functions.php';
require_once 'helpers/menu-nav-walker.php';
require_once 'helpers/Comment_List_Dropdown.php';
require_once 'helpers/navigation.php';
require_once 'helpers/toc-generator.php';
require_once 'helpers/feedback-form.php';
require_once 'helpers/translate.php';
require_once 'helpers/get-component.php';
require_once 'helpers/language_redirect.php';
require_once 'helpers/redirect.php';
require_once 'helpers/shortcodes.php';

// Components
include_once WP_PLUGIN_DIR . '/Components/Components.php';

// Dynamic Slots
include_once WP_PLUGIN_DIR . '/DynamicSlots/DynamicSlots.php';

if(file_exists(WP_PLUGIN_DIR . '/MatchCenter/MatchCenter.php')) {
    require_once  WP_PLUGIN_DIR . '/MatchCenter/MatchCenter.php';
}

if(file_exists(WP_PLUGIN_DIR . '/Predictor/Predictor.php')) {
    require_once WP_PLUGIN_DIR . '/Predictor/Predictor.php';
}

include_once get_template_directory() . '/PredictorFront/PredictorFront.php';

//define( 'LANG_OPTIONS', get_field('site_language', 'options') );
