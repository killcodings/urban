export default class SlidePanel {
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
        data.append('action', 'slide_panel_ajax');
        data.append('screen', this.screen);

        if (enabledOptions['slidePanelEnabledPage']) {
            data.append('pageID', enabledOptions['pageID']);
        }

        fetch(jsVars['ajaxurl'], {
            method: 'POST',
            credentials: 'same-origin',
            body: data
        }).then((response) => response.json())
            .then((data) => {
                if (data) {
                    // console.log(data['panel']);
                    this.render(data['panel'], data['delay']);
                }
            });
    }

    render(data, delay) {
        setTimeout(() => {
            const panel = document.createElement('div');
            panel.innerHTML = data;
            document.body.appendChild(panel);
            this.click(panel);
        }, (delay * 1000));
    }
}
