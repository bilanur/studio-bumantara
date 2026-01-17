    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const indicators = document.querySelectorAll('.indicator');
    let autoSlideInterval;

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(indicator => indicator.classList.remove('active'));

        slides[index].classList.add('active');
        indicators[index].classList.add('active');
    }

    function changeSlide(direction) {
        currentSlide += direction;

        if (currentSlide < 0) {
            currentSlide = slides.length - 1;
        } else if (currentSlide >= slides.length) {
            currentSlide = 0;
        }

        showSlide(currentSlide);
        resetAutoSlide();
    }

    function goToSlide(index) {
        currentSlide = index;
        showSlide(currentSlide);
        resetAutoSlide();
    }

    function autoSlide() {
        currentSlide++;
        if (currentSlide >= slides.length) {
            currentSlide = 0;
        }
        showSlide(currentSlide);
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(autoSlide, 5000);
    }

    // Start auto slide
    autoSlideInterval = setInterval(autoSlide, 5000);

    // Pause on hover
    const carousel = document.querySelector('.hero-carousel');
    carousel.addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });

    carousel.addEventListener('mouseleave', () => {
        resetAutoSlide();
    });
