<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future Colors</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <!-- Header content will be loaded here by script.js -->
    </header>
<!-- 
    <section class="main-hero">
       <div class="main-hero-slideshow">
            <div class="main-hero-slide" style="background-image: url('res/general-images/home-page/pexels-mikhail-nilov-7821344.jpg');"></div>
            <div class="main-hero-slide" style="background-image: url('res/general-images/home-page/pexels-sliceisop-2460434.jpg');"></div>
            <div class="main-hero-slide" style="background-image: url('res/general-images/home-page/pexels-introspectivedsgn-12973597.jpg');"></div>
            <div class="main-hero-slide" style="background-image: url('res/general-images/home-page/pexels-introspectivedsgn-18462196.jpg');"></div>

        </div> 
        <div class="main-hero-slideshow">
            <video autoplay muted loop playsinline class="main-hero-video">
                <source src="res\Logo  Reveal.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        </div>
        <div class="main-hero-overlay"></div>
        <div class="main-hero-content">
                <h1>
                    <span class="blue-text">Future</span> 
                    <span class="yellow-text">Colours</span>
                </h1>
            <p>Your Trusted Signage & Branding Partner in UAE</p>
        </div>
    </section> -->

    <section class="main-hero">
        <video autoplay muted loop playsinline class="main-hero-video">
            <source src="res\Logo  Reveal.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </section>


    <section class="about-section section">
        <div class="about-container">
            <div class="about-image-grid slide-in-left">
                <?php
                $about_images = glob('res/general-images/about-page/*.{jpg,jpeg,png}', GLOB_BRACE);
                foreach(array_slice($about_images, 0, 9) as $index => $image) {
                    echo '<img src="' . $image . '" alt="About Future Colours" class="grid-img-' . ($index + 1) . '">';
                }
                ?>
            </div>
            <div class="about-text slide-in-right">
                <h2>Who We Are</h2>
                <p>
                    With years of experience in the UAE's signage industry, Future Colours has established itself as a leading provider of high-quality signage and branding solutions.
                </p>
                <p>
                    We combine creative design, premium materials, and expert craftsmanship to deliver signage solutions that help businesses make a lasting impression.
                </p>
                <a href="about-us.php" class="cta-button">Learn More</a>
            </div>
        </div>
    </section>

    <section class="services-section section fade-in">
        <div class="container">
            <h2 class="section-title" style="color: white;">Our Services</h2>
            <p class="section-subtitle">We provide a wide range of high-quality signage and branding solutions to elevate your business presence.</p>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-sign-hanging"></i></div>
                    <h3>3D Indoor and Outdoor Signs</h3>
                    <p>Eye-catching and durable 3D signs that make your brand stand out from the competition.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-layer-group"></i></div>
                    <h3>Complete Printing Solutions</h3>
                    <p>Bring your ideas to life with advanced printers delivering vibrant, durable, and high-impact signage.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-gift"></i></div>
                    <h3>Personalised Gift Items</h3>
                    <p>Customised gifts and promotional items to enhance your brand visibility and customer engagement.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-compass-drafting"></i></div>
                    <h3>Acrylic Fabrication</h3>
                    <p>Custom acrylic solutions crafted with precision perfect for signage, displays, and creative projects.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="offer-section section">
        <div class="offer-container">
            <div class="offer-text slide-in-left">
                <h2 class="section-title-left" style="color: white;">What We Offer</h2>
                <p>Beyond products, we offer a partnership dedicated to quality, reliability, and your success.</p>
                <ul class="offer-list">
                    <li><i class="fas fa-check-circle"></i> <span><strong>High-Quality Materials:</strong> We use only premium, durable materials for long-lasting results.</span></li>
                    <li><i class="fas fa-check-circle"></i> <span><strong>Expert Installation:</strong> Our skilled team ensures a flawless and secure installation every time.</span></li>
                    <li><i class="fas fa-check-circle"></i> <span><strong>Creative Design Process:</strong> Collaborative design to bring your vision to life perfectly.</span></li>
                    <li><i class="fas fa-check-circle"></i> <span><strong>Timely Delivery:</strong> We respect your deadlines and guarantee on-time project completion.</span></li>
                </ul>
            </div>
            <div class="offer-image slide-in-right">
                <img src="res\general-images\workshop\WhatsApp Image 2025-09-04 at 14.26.32_30d265b6.jpg" alt="Our workshop showing precision work">
            </div>
        </div>
    </section>

    <section class="testimonials-section section fade-in">
        <div class="container">
            <h2 class="section-title" style="color: white;">What Our Clients Say</h2>
            <div class="testimonial-slider-container">
                <div class="testimonials-grid">
                    <div class="testimonial-card">
                        <p class="testimonial-quote">"The quality and professionalism were outstanding. Our new sign looks amazing and has already attracted new customers. Highly recommended!"</p>
                        <div class="testimonial-author">
                            <img src="https://placehold.co/100x100/eeeeee/1a4b84?text=JD" alt="Client photo">
                            <div class="author-details">
                                <span class="author-name">John Doe</span>
                                <span class="author-company">CEO, Example Corp</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <p class="testimonial-quote">"From design to installation, the process was seamless. The team at Future Colours understood our vision and delivered beyond our expectations."</p>
                        <div class="testimonial-author">
                            <img src="https://placehold.co/100x100/eeeeee/1a4b84?text=AS" alt="Client photo">
                            <div class="author-details">
                                <span class="author-name">Alice Smith</span>
                                <span class="author-company">Owner, The Boutique</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <p class="testimonial-quote">“Future Colours transformed our office interiors with their stunning signage solutions. The precision and creativity they bring perfectly complement our design aesthetics.”</p>
                        <div class="testimonial-author">
                            <img src="https://placehold.co/100x100/eeeeee/1a4b84?text=MB" alt="Client photo">
                            <div class="author-details">
                                <span class="author-name">Ayesha Khan</span>
                                <span class="author-company">Interior Design Consultant, UrbanNest Interiors</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card">
                        <p class="testimonial-quote">“Their branding and signage work added the perfect finishing touch to our client’s retail space. Professional, reliable, and always exceeding expectations.”</p>
                        <div class="testimonial-author">
                            <img src="https://placehold.co/100x100/eeeeee/1a4b84?text=SC" alt="Client photo">
                            <div class="author-details">
                                <span class="author-name">Rohan Mehta</span>
                                <span class="author-company">Senior Interior Designer, VisionSpace Studio</span>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="slide-arrow prev"><i class="fas fa-chevron-left"></i></button>
                <button class="slide-arrow next"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

    <footer>
        <!-- Footer content will be loaded here by script.js -->
    </footer>
    
    <!-- The 'defer' attribute ensures the script runs after the HTML is parsed -->
    <script src="script.js" defer></script>
</body>
</html>
