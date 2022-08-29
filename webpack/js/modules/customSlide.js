import { tns } from '../../../node_modules/tiny-slider/src/tiny-slider'

const customSlider = () => {
  const slider = document.querySelectorAll('.siema')
  slider.forEach((item) => {
    if (item) {
      tns({
        container: item,
        items: 1,
        mouseDrag: true,
        autoWidth: true,
        slideBy: 'page',
        nav: false,
        arrowKeys: true,
        controlsText: ['<', '>'],
      });
    }
  })

}

export default function () {
  customSlider();
}