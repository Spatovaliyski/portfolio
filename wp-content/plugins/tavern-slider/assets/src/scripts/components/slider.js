let Slider = (function () {
  let activeIndex = 0;
  let slides = [];
  let startX = 0;
  let isDragging = false;

  /**
   * Initialize the component
   */
  let _init = () => {
    setTimeout(() => {
      _updateSlides();
      _setupEventListeners();
      _startChangeDetection();
    }, 1000);
  };

  /**
   * Update slider on drag by adding/subtracting from a simple Index
   */
  let _updateSlides = function () {
    slides = Array.from(document.querySelectorAll('.tavern-slider__item'));
  
    const track = document.querySelector('.tavern-slider__slider-wrapper');
    const trackWidth = track.offsetWidth;

    const offset = 16;
    const totalOffset = activeIndex * offset;
    track.style.transform = `translateX(${-activeIndex * trackWidth - totalOffset}px)`;
  
    slides.forEach((slide, index) => {
      if (index === activeIndex) {
        slide.classList.remove('is-active', 'fade-out');
        slide.offsetHeight; // Triggers reflow
        slide.classList.add('is-active');
      } else {
        slide.classList.add('fade-out');
        setTimeout(() => {
          slide.classList.remove('is-active');
          slide.classList.remove('fade-out');
        }, 1000);
      }
    });
  
    _setPostPosition();
  };
    
  /**
   * Handles dragging and swiping
   */
  let _setupEventListeners = function () {
    slides.forEach((slide, index) => {
      slide.addEventListener('mousedown', _startDrag);
      slide.addEventListener('mousemove', _drag);
      slide.addEventListener('mouseup', _endDrag);
      slide.addEventListener('mouseleave', _cancelDrag);
    });

    // Touch events for mobile
    slides.forEach((slide, index) => {
      slide.addEventListener('touchstart', _startDrag);
      slide.addEventListener('touchmove', _drag);
      slide.addEventListener('touchend', _endDrag);
    });

    // Arrow click events
    const nextArrow = document.querySelector('.tavern-slider__control.next');
    const prevArrow = document.querySelector('.tavern-slider__control.prev');

    nextArrow.addEventListener('click', _handleNextArrowClick);
    prevArrow.addEventListener('click', _handlePrevArrowClick);

    // Arrow key events
    document.addEventListener('keydown', function(event) {
      switch (event.key) {
        case 'ArrowLeft':
          _handlePrevArrowClick();
          break;
        case 'ArrowRight':
          _handleNextArrowClick();
          break;
      }
    });

    _updateSlides();
  };

  let _startDrag = function (e) {
    isDragging = true;
    startX = e.type === 'touchstart' ? e.touches[0].clientX : e.clientX;
  };

  let _drag = function (e) {
    if (!isDragging) return;
    const currentX = e.type === 'touchmove' ? e.touches[0].clientX : e.clientX;
    const difference = currentX - startX;

    if (difference > 50) {
      _handlePrevArrowClick();
      isDragging = false;
    }
    else if (difference < -50) {
      _handleNextArrowClick();
      isDragging = false;
    }
  };

  let _endDrag = function (e) {
    isDragging = false;
  };

  let _cancelDrag = function (e) {
    isDragging = false;
  };

  /**
   * Drag => Position Left
   */
  let _handlePrevArrowClick = function () {
    activeIndex--;

    if (0 > activeIndex) {
      activeIndex = slides.length - 1;
    }

    _updateSlides();
  };

  /**
   * Drag => Position Right
   */
  let _handleNextArrowClick = function () {
    activeIndex++;

    if (activeIndex >= slides.length) {
      activeIndex = 0;
    }

    _updateSlides();
  };

  /**
   * Check for changes in the slider and reinitialize if necessary
   */
  let _checkForChanges = function () {
    const newSlides = Array.from(document.querySelectorAll('.tavern-slider__item'));

    // Check if the number of slides has changed
    if (newSlides.length !== slides.length) {
      // Number of slides has changed, reinitialize the slider
      slides = newSlides;

      activeIndex = 0;
      
      _updateSlides();
    }
  };

  /**
   * Start detecting changes in the slider
   */
    let _startChangeDetection = function () {
      // Use MutationObserver to detect changes in the DOM
      const observer = new MutationObserver(_checkForChanges);
  
      // Observe changes in the parent element of slides
      const parentElement = document.querySelector('.tavern-slider__slider-wrapper');
      observer.observe(parentElement, { childList: true, subtree: true });
    };

  /**
   * Display the amount of posts and which post the target is in
   */
  let _setPostPosition = function () {
    const index = activeIndex + 1;
    const amount = slides.length;
    const currentPost = document.querySelector('.tavern-slider__controls .current-post');
    const totalPosts = document.querySelector('.tavern-slider__controls .total-posts');

    currentPost.textContent = index;
    totalPosts.textContent = amount;
  };

  return {
    init: function () {
      _init();
    }
  }
})();

export default Slider;