export default class IframeAdd {
    constructor() {
        this.init();
    }
    init() {
        window.onload = function () {
            const items = document.querySelectorAll('.image_iframe');
            const img = document.querySelector('.image_iframe img');
            let oneClick = true;
            items.forEach((elem) => {
                elem.addEventListener('click', (e) => {
                    const elem = e.currentTarget;
                    elem.classList.toggle('active');
                    const iframeUrl = elem.dataset.url;
                    let iframe = document.createElement('iframe');
                    const args = {
                        width : '100%',
                        height : '100vh'
                    }
                    iframe.setAttribute('style', `width:${args.width};height:${args.height}`);
                    // iframe.setAttribute('src', 'https://demo.spribe.io/launch/aviator?currency=INR&lang=HI');
                    iframe.setAttribute('src', 'https://plinko.1play.one/?exitUrl=null&language=en&b=6cd0a2d7bafc5c5d22e4ac58290de6e9f6959dff4bb2269eb4c4747cccd49c50914e453015bc36da180c1d9a5228d1a478685240a95622d0905f7a1f8ea159a44afaa8c8a1fa8149e61e51a0b0439b8433b62a2e418d5f93f10ad1e606b7bd598e36bde232.e1cbdca9769200ac46f45c578b7a6e7b');
                    elem.appendChild(iframe);
                    if (oneClick) {
                        fade(img, 1000, function () {
                            // console.log(this);
                            img.style.display = 'none';
                        })
                        oneClick = false;
                    }
                })
            })

            function fade(elem, t, f) {
                let fps = 50;
                let time = t;
                let steps = time/fps;
                let op = 1;
                let d0 = op/steps;
                let callback = f || function () {};
                let timer = setInterval(function () {
                    op -= d0;
                    elem.style.opacity = op;
                    steps--;

                    if (steps === 0) {
                        clearInterval(timer);
                        callback.call(elem);
                    }
                },(1000/fps));
            }
        }
    }
}
