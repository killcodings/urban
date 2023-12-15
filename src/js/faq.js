export default class Faq {
    constructor() {
        this.elemClass = '.cg-faq_div';
        this.init();
    }

    init() {
        const hiddenTextItems = document.querySelectorAll(this.elemClass);
        hiddenTextItems.forEach((item) => {
            item.addEventListener('click', function (e) {
                console.log(e.target);
                const itemTitle = this.querySelector('.hidden-text__title');
                if (e.target === itemTitle) {
                    this.classList.toggle('cg-faq_open');
                }
            });
        })
    }
}
