document.addEventListener("DOMContentLoaded", function() {

    // --- Centralized Page Initializer ---
    // This function runs after all components are loaded.
    function initializePage() {
        initMobileMenu();
        initDropdowns();
        initServiceSlideshows();
        initHeroSlideshow();
        initTestimonialSlider();
        initScrollAnimations();
        initNotificationCarousel();
        // Add any other initialization functions here
    }

    // --- Component & Logic Definitions ---

    // Function to initialize mobile menu functionality
    function initMobileMenu() {
        const mobileToggle = document.querySelector('.mobile-menu-toggle');
        const navLinks = document.querySelector('.nav-links');
        if (mobileToggle && navLinks) {
            mobileToggle.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });
        }
    }

    // Function to initialize dropdowns (if you re-add them later)
    function initDropdowns() {
        const dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('click', function(e) {
                this.classList.toggle('open');
                e.stopPropagation();
            });
        });
    }

    // Load Header and Footer components
    function loadComponents() {
        const headerPlaceholder = document.querySelector('header');
        const footerPlaceholder = document.querySelector('footer');

        const headerPromise = headerPlaceholder ?
            fetch('header.html')
            .then(response => response.ok ? response.text() : Promise.reject('Header not found'))
            .then(data => headerPlaceholder.innerHTML = data) :
            Promise.resolve();

        const footerPromise = footerPlaceholder ?
            fetch('footer.html')
            .then(response => response.ok ? response.text() : Promise.reject('Footer not found'))
            .then(data => footerPlaceholder.innerHTML = data) :
            Promise.resolve();

        return Promise.all([headerPromise, footerPromise]);
    }

    // Function to initialize service page slideshows with a classic, infinite loop
    function initServiceSlideshows() {
        const slideshows = document.querySelectorAll('.service-slideshow');

        slideshows.forEach(slideshow => {
            const wrapper = slideshow.querySelector('.slides-wrapper');
            const slides = slideshow.querySelectorAll('.service-slide');
            const prevBtn = slideshow.querySelector('.slide-arrow.prev');
            const nextBtn = slideshow.querySelector('.slide-arrow.next');
            
            if (!wrapper || slides.length <= 1) {
                if (prevBtn) prevBtn.style.display = 'none';
                if (nextBtn) nextBtn.style.display = 'none';
                return;
            }

            let currentIndex = 0;
            let autoplayInterval = null;
            const AUTOPLAY_DELAY = 5000; // 5 seconds

            function goToSlide(index) {
                // Loop around
                if (index < 0) {
                    index = slides.length - 1;
                } else if (index >= slides.length) {
                    index = 0;
                }
                wrapper.style.transform = `translateX(-${index * 100}%)`;
                currentIndex = index;
            }

            function handleNext() {
                goToSlide(currentIndex + 1);
            }

            function handlePrev() {
                goToSlide(currentIndex - 1);
            }

            function startAutoplay() {
                stopAutoplay(); // Prevent multiple intervals
                autoplayInterval = setInterval(handleNext, AUTOPLAY_DELAY);
            }

            const stopAutoplay = () => clearInterval(autoplayInterval);

            if (nextBtn) nextBtn.addEventListener('click', () => { stopAutoplay(); handleNext(); });
            if (prevBtn) prevBtn.addEventListener('click', () => { stopAutoplay(); handlePrev(); });

            slideshow.addEventListener('mouseenter', stopAutoplay);
            slideshow.addEventListener('mouseleave', startAutoplay);

            goToSlide(0); // Set initial position
            startAutoplay();
        });
    }

    // Function to initialize the hero slideshow
    function initHeroSlideshow() {
        const slides = document.querySelectorAll('.hero-slide');
        if (slides.length === 0) return;

        let currentSlide = 0;
        slides[currentSlide].classList.add('active'); // Set initial active slide

        setInterval(() => {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }, 5000); // Change slide every 5 seconds
    }

    // Function to initialize the testimonial slider
    function initTestimonialSlider() {
        const container = document.querySelector('.testimonial-slider-container');
        if (!container) return;
    
        const wrapper = container.querySelector('.testimonials-grid');
        const prevBtn = container.querySelector('.slide-arrow.prev');
        const nextBtn = container.querySelector('.slide-arrow.next');
        const slides = Array.from(wrapper.children);
    
        // Dynamically create a viewport for overflow
        const viewport = document.createElement('div');
        viewport.classList.add('testimonial-slider-viewport');
        wrapper.parentNode.insertBefore(viewport, wrapper);
        viewport.appendChild(wrapper);
    
        if (slides.length < 2) {
            if (prevBtn) prevBtn.style.display = 'none';
            if (nextBtn) nextBtn.style.display = 'none';
            return;
        }
    
        let currentIndex = 0;
        let autoplayInterval = null;
        const AUTOPLAY_DELAY = 7000; // 7 seconds
    
        const updateSlider = () => {
            const visibleSlides = window.innerWidth >= 992 ? 2 : 1;
            const maxIndex = slides.length - visibleSlides;
    
            const slideWidth = slides[0].getBoundingClientRect().width;
            const gap = parseInt(window.getComputedStyle(wrapper).gap) || 0;
            const offset = currentIndex * (slideWidth + gap);
    
            wrapper.style.transform = `translateX(-${offset}px)`;
    
            if (prevBtn) prevBtn.disabled = currentIndex === 0;
            if (nextBtn) nextBtn.disabled = currentIndex >= maxIndex;
        };
    
        const startAutoplay = () => {
            stopAutoplay(); // Ensure no multiple intervals are running
            autoplayInterval = setInterval(() => {
                const visibleSlides = window.innerWidth >= 992 ? 2 : 1;
                const maxIndex = slides.length - visibleSlides;
                currentIndex++;
                if (currentIndex > maxIndex) {
                    currentIndex = 0; // Loop back to the start
                }
                updateSlider();
            }, AUTOPLAY_DELAY);
        };
    
        const stopAutoplay = () => {
            clearInterval(autoplayInterval);
        };
    
        if (nextBtn) nextBtn.addEventListener('click', () => { stopAutoplay(); currentIndex++; updateSlider(); });
        if (prevBtn) prevBtn.addEventListener('click', () => { stopAutoplay(); currentIndex--; updateSlider(); });
    
        container.addEventListener('mouseenter', stopAutoplay);
        container.addEventListener('mouseleave', startAutoplay);
    
        window.addEventListener('resize', updateSlider);
        updateSlider(); // Initial position
        startAutoplay(); // Start the slideshow
    }

    // Notification carousel
    function initNotificationCarousel() {
        const carousel = document.getElementById('notificationCarousel');
        if (carousel) {
            const slides = carousel.querySelectorAll('.notification-slide');
            let currentSlide = 0;
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            const showSlide = (index) => slides.forEach((slide, i) => slide.classList.toggle('active', i === index));

            prevBtn?.addEventListener('click', () => showSlide(currentSlide = (currentSlide - 1 + slides.length) % slides.length));
            nextBtn?.addEventListener('click', () => showSlide(currentSlide = (currentSlide + 1) % slides.length));
        }
    }

    // Fade-in effect on scroll
    function initScrollAnimations() {
        const animatedElements = document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right');
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target); // Stop observing after animation
                }
            });
        }, {
            threshold: 0.1 // Trigger when 10% of the element is visible
        });
        animatedElements.forEach(el => observer.observe(el));
    }

    // --- Main Execution ---
    loadComponents()
        .then(initializePage)
        .catch(error => console.error("Error initializing page components:", error));
});

// Add this to your existing script.js or in a script tag
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.main-hero-slide');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach(slide => {
            slide.classList.remove('active');
            slide.style.display = 'none';
        });
        slides[index].classList.add('active');
        slides[index].style.display = 'block';
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Initialize slideshow
    showSlide(0);
    setInterval(nextSlide, 5000);
});

  const header = document.querySelector("header");

  if (window.location.pathname.endsWith("index.php") || window.location.pathname === "/") {
    window.addEventListener("scroll", () => {
      if (window.scrollY > window.innerHeight * 0.8) {
        header.classList.remove("hidden");
      } else {
        header.classList.add("hidden");
      }
    });

    // Hide header initially
    header.classList.add("hidden");
  }