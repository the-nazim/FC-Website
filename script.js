document.addEventListener("DOMContentLoaded", function() {

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
    const loadComponents = () => {
        const headerPlaceholder = document.querySelector('header');
        const footerPlaceholder = document.querySelector('footer');

        if (headerPlaceholder) {
            fetch('header.html')
                .then(response => response.text())
                .then(data => {
                    headerPlaceholder.innerHTML = data;
                    // IMPORTANT: Initialize scripts that depend on header content
                    initMobileMenu();
                    initDropdowns();
                })
                .catch(error => console.error('Error loading header:', error));
        }

        if (footerPlaceholder) {
            fetch('footer.html')
                .then(response => response.text())
                .then(data => {
                    footerPlaceholder.innerHTML = data;
                })
                .catch(error => console.error('Error loading footer:', error));
        }
    };

    loadComponents();

    // Function to initialize service page slideshows
    function initServiceSlideshows() {
        const slideshows = document.querySelectorAll('.service-slideshow');

        slideshows.forEach(slideshow => {
            const wrapper = slideshow.querySelector('.slides-wrapper');
            const slides = slideshow.querySelectorAll('.service-slide');
            const prevBtn = slideshow.querySelector('.slide-arrow.prev');
            const nextBtn = slideshow.querySelector('.slide-arrow.next');
            
            if (!wrapper || slides.length <= 1 || !prevBtn || !nextBtn) {
                if(prevBtn) prevBtn.style.display = 'none';
                if(nextBtn) nextBtn.style.display = 'none';
                return; // Don't initialize if essential elements are missing or only one slide
            }

            let currentIndex = 0;
            const slideCount = slides.length;

            function goToSlide(index) {
                if (index < 0) index = slideCount - 1;
                else if (index >= slideCount) index = 0;
                
                wrapper.style.transform = `translateX(-${index * 100}%)`;
                currentIndex = index;
            }

            prevBtn.addEventListener('click', () => goToSlide(currentIndex - 1));
            nextBtn.addEventListener('click', () => goToSlide(currentIndex + 1));
        });
    }
    initServiceSlideshows();

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
    initHeroSlideshow();

    // --- Other page scripts ---

    // Notification carousel
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

    // Fade-in effect on scroll
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
});
