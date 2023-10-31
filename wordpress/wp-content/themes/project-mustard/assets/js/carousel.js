document.addEventListener('DOMContentLoaded', function() {
  carousel();
})

carousel = () => {
  let carousel = document.querySelector('.carousel');
  if (carousel) {
    let track = carousel.querySelector('.carousel__track');
    let index = 0;
    let slides = carousel.querySelectorAll('.carousel__slide');
    let slideCount = slides.length;
    let slideWidth = slides[0].offsetWidth + 30; //margin-right 30px

    // if window resizes, check slideWidth again
    window.addEventListener('resize', () => {
      slideWidth = slides[0].offsetWidth + 30; //margin-right 30px
      currentSlideReset();
    })

    // slide events, offset carousel track by slide width x index
    let nextSlide = () =>{
      // reset to zero if at end of carousel
      if (index < slideCount - 1) {
        index++;
      }else{
        index = 0;
      }
      track.style.transform = `translateX(-${index * slideWidth}px)`;
    }

    let prevSlide = () =>{
      // reset to end of carousel if at zero
      if (index > 0) {
        index--;
      }else{
        index = slideCount - 1;
      }
      track.style.transform = `translateX(-${index * slideWidth}px)`;
    }

    // on window resize, reset the offset since the slide width will change
    let currentSlideReset = () => {
      track.style.transform = `translateX(-${index * slideWidth}px)`;
    }

    let nextButton = carousel.querySelector('.carousel__control--next');
    let prevButton = carousel.querySelector('.carousel__control--prev');

    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', prevSlide);

    // swipe controls on carousel
    let touchStartX = 0;
    let touchEndX = 0;

    carousel.addEventListener('touchstart', (e) => {
      touchStartX = e.touches[0].clientX;
    })

    carousel.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].clientX;
      if (touchStartX - touchEndX > 100) {
        nextSlide();
      }else if (touchStartX - touchEndX < -100) {
        prevSlide();
      }
    })

  }
}