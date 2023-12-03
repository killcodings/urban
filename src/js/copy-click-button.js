export default class CopyClickButton {
    constructor(button) {
        this.button = button;
        this.copyValue = this.button.dataset.copy;
        this.init();
    }

    init() {
        this.button.addEventListener('click', (e) => {
            this.copy(this.copyValue)
        });
    }

    copy(text) {
        navigator.clipboard.writeText(text).then(() => {
            if(this.button.className === 'promocode copy-click-button') {
                this.button.querySelector('.promocode__value').innerHTML = 'Copied';
            } else {
                this.button.innerHTML = 'Copied';
            }
        });
    }
}
