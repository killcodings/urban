export default class FormTabs {
    constructor() {
        this.tab = document.querySelector('.tabs-control');
        this.init();
    }

    init() {
        if (this.tab) {
            const tabControl = this.tab.querySelectorAll('.tabs-control__item');
            let commentTitle = document.querySelector('.comment-form__title');
            const commentTitleDefault = commentTitle.textContent;
            const feedbackForm = document.querySelector('.review-rating');
            let form__button = document.querySelector('.comment-form__form .site-button');
            let activeControl = tabControl[0];
            tabControl.forEach((button) => {
                button.addEventListener('click', (evt) => {
                    // const tabId = button.dataset.tab;
                    button.classList.add('tabs-control__item_active');
                    activeControl.classList.remove('tabs-control__item_active');
                    activeControl = button;
                    form__button.classList.remove('comment-form__button');
                    form__button.classList.remove('reviews-form__button');

                    if (document.querySelector('.comment-form__form')) {
                        document.querySelector('.comment-form__form').classList.remove('comment-form__form');
                    }
                    if (document.querySelector('.feedback-form__form')) {
                        document.querySelector('.feedback-form__form').classList.remove('feedback-form__form');
                    }

                    if(activeControl == tabControl[0]) {
                        form__button.classList.add('comment-form__button');
                        document.querySelector('.comment-form form').classList.add('comment-form__form');
                        commentTitle.textContent = commentTitleDefault;
                        feedbackForm.style.display = 'none';
                    }
                    if(activeControl == tabControl[1]) {
                        form__button.classList.add('reviews-form__button');
                        document.querySelector('.comment-form form').classList.add('feedback-form__form');
                        commentTitle.textContent = 'Feedback';
                        feedbackForm.style.display = 'flex';
                    }
                    // this.toggleTab(tabId);
                });
            });
            // let s = () => tabControl[1].click();
            // setTimeout(s, 1000);
            tabControl[1].click();
        }
    }

    // toggleTab(id) {
    //     let activeTab = this.tab.querySelectorAll(`.brand-tab [data-tab]`);
    //     const needTab = this.tab.querySelectorAll(`.brand-tab [data-tab="${id}"]`);
    //     activeTab.forEach(tab => {
    //         console.log('active', tab);
    //         tab.classList.remove('brand-tab__item_active');
    //         tab.classList.add('brand-tab__item_inactive');
    //     });
    //     needTab.forEach(tab => {
    //         console.log('need', tab);
    //         tab.classList.remove('brand-tab__item_inactive');
    //         tab.classList.add('brand-tab__item_active');
    //     });
    // }
}
