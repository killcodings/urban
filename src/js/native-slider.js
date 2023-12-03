export default class NativeSlider {
    constructor() {
        this.init();
    }

    init() {
        const lis = [...document.querySelectorAll('.native-slider .slide')];
        if (lis.length !== 0) {
            const width = lis[0].clientWidth;

            lis.map((el, index) => rightSlidersJump(el, index));

            let i = lis.length;

            function rightSlidersJump(el, index) {
                if (el.parentElement.getBoundingClientRect().x + (lis.length - 3) * (width+20) < el.getBoundingClientRect().x) {
                    el.style.transition = ''
                    // el.style.left = +el.style.left.slice(0, -2) - (width + 20) * lis.length + 'px'
                }
            }

            function rightSliders(el, index) {
                el.style.left = +el.style.left.slice(0, -2) + (width+20) + 'px'
                rightSlidersJump(el, index)
            };

            rightslide.onclick = function() {
                if (i < lis.length && i >= 1) {
                    lis.map((el, index) => rightSliders(el, index))
                    i++
                }
            };


            function leftSlidersJump(el, index) {
                if (el.parentElement.getBoundingClientRect().x - (lis.length - 5) * (width+20) > el.getBoundingClientRect().x) {
                    el.style.transition = ''
                    // el.style.left = +el.style.left.slice(0, -2) + (width+20) * lis.length + 'px'
                }
            };

            function leftSliders(el, index) {
                el.style.left = +el.style.left.slice(0, -2) - (width+20) + 'px'
                leftSlidersJump(el, index)
            };


            leftslide.onclick = function() {
                if (i <= lis.length && i > 1) {
                    lis.map((el, index) => leftSliders(el, index))
                    i--
                    leftslide.classList.remove('active')
                }
            };
            leftslide.click()
            rightslide.click()
            leftslide.classList.add('active')
        }
    }
}
