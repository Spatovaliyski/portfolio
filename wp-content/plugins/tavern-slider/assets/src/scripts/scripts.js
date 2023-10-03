import Slider from "./components/slider";

document.addEventListener('DOMContentLoaded', function () {
  // Let everything load in first, the slider logic can trigger a little bit after
  setTimeout(() => {
    Slider.init();
  }, 1000);
});