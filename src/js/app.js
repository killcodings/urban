import '../scss/app.scss';
// import '../../partials/gutenberg-blocks/cg-button/index';

import PrimaryNav from "./primary-nav";
import Video from "./video";
import Faq from './faq';
import Toc from "./toc";
import Comments from "./comments";
import TopButton from "./top-button";
import ClickButton from "./click-button";
import FeedbackForm from "./feedback-form";
import Feedback from "./feedback";
import MobileButton from './mobile-button';
import BonusButton from "./bonus-button";
import HeaderBonus from "./header-bonus";
import IframeAdd from "./iframe";
import ReviewForm from "./review-form";
import FormTabs from "./form-tabs";
import NativeSlider from "./native-slider";
import Popup from './popup';
import SlidePanel from './slide-panel';
import CopyClickButton from "./copy-click-button";


/*

if (typeof enabledOptions !== 'undefined') {
    if (enabledOptions['popupEnabledGlobal']) {
        new Popup;
    }
    if (enabledOptions['slidePanelEnabledGlobal']) {
        new SlidePanel;
    }
}
*/


const copyClickButtons = document.querySelectorAll('.copy-click-button');
if (copyClickButtons) {
    copyClickButtons.forEach((button) => {
        new CopyClickButton(button);
    });
}

document.addEventListener('DOMContentLoaded', async () => {

    window.refs = {
        faq: {
            init: () => new Faq,
            selectors: ['.hidden-text_div']
        },
        primaryNav: {
            init: () => new PrimaryNav,
            selectors: ['.primary-nav']
        },
        video: {
            init: () => new Video,
            selectors: ['.video']
        },
        toc: {
            init: () => new Toc,
            selectors: ['.toc__show']
        },
        formTabs: {
            init: () => new FormTabs(),
            selectors: ['.tabs-control']
        },
        comments: {
            init: () => new Comments,
            selectors: ['.comments-container']
        },
        reviewForm: {
            init: () => new ReviewForm,
            selectors: ['.comments-container .reviews']
        },
        topButton: {
            init: () => new TopButton,
            selectors: ['.top-button']
        },
        clickButton: {
            init: () => new ClickButton,
            selectors: ['.click-button']
        },
        feedbackForm: {
            init: () => new FeedbackForm,
            selectors: ['.feedback-form']
        },
        mobileButton: {
            init: () => new MobileButton,
            selectors: ['.mobile-button']
        },
        bonusButton: {
            init: () => new BonusButton,
            selectors: ['.bonus-button']
        },
        headerBonus: {
            init: () => new HeaderBonus,
            selectors: ['.header-bonus']
        },
        iframeAdd: {
            init: () => new IframeAdd,
            selectors: ['.image_iframe']
        },
        feedback: {
            init: () => new Feedback,
            selectors: ['.feedback-container']
        },
        nativeSlider: {
            init: () => new NativeSlider(),
            selectors: ['.native-slider']
        }
    }

    Object.keys(window.refs).forEach((ref) => {
        if (
            window.refs[ref].hasOwnProperty('init') &&
            window.refs[ref].selectors.join(',').length > 0
        ) {
            window.refs[ref].class = window.refs[ref].init();
        }
    });
});
