export default class Popup {
    constructor() {
        this.getWindowWidth();
        this.getAjax();
    }

    getWindowWidth() {
        if (window.innerWidth >= 834) {
            this.screen = 'desktop';
        } else {
            this.screen = 'mobile';
        }
    }

    click(elem) {
        const buttons = elem.querySelectorAll('.click-button');
        buttons.forEach((button) => {
            button.addEventListener('click', function () {
                window.location.href = this.dataset.link
            });
        });
    }

    getAjax() {
        const data = new FormData();
        data.append('action', 'ajax_popup');
        data.append('screen', this.screen);

        if (enabledOptions['popupEnabledPage']) {
            data.append('pageID', enabledOptions['pageID']);
        }

        fetch(jsVars['ajaxurl'], {
            method: 'POST',
            credentials: 'same-origin',
            body: data
        }).then(response => response.json())
            .then((data) => {
                if (data) {
                    this.render(data['popup'], data['delay']);
                }
            });
    }

    render(data, delay) {
        setTimeout(() => {
            const popup = document.createElement('div');
            popup.classList.add('popup-wrapper');
            popup.innerHTML = data;
            document.body.appendChild(popup);
            document.body.style.overflow = 'hidden';
            this.close(popup);
            this.click(popup);
        }, (delay * 1000));

    }

    close(popup) {
        const cross = popup.querySelector('.popup__cross');
        cross.addEventListener('click', () => {
            popup.remove();
            document.body.style.overflow = 'visible';
        });
    }
}
