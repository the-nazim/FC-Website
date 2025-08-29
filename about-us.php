<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <!-- Header content will be loaded here by script.js -->
    </header>

    <section class="hero hero-inner">
        <div class="hero-container">
            <div class="hero-content-left">
                <h1>About Future Colours</h1>
                <p>Discover the mission, vision, and the talented team behind our success.</p>
            </div>
            <div class="hero-image-right">
                <img src="res/general-images/about-page/title-image.png" alt="About Future Colours">
            </div>
        </div>
    </section>

    <!-- <section class="about-section section">
        <div class="about-container">
            <div class="about-image-grid slide-in-left">
                <img src="https://placehold.co/600x400/1f2937/ffffff?text=Our+Workshop" alt="Our workshop" class="grid-img-1">
                <img src="https://placehold.co/400x600/374151/ffffff?text=Design+Process" alt="Design process" class="grid-img-2">
                <img src="https://placehold.co/400x400/4b5563/ffffff?text=Finished+Product" alt="A finished product" class="grid-img-3">
            </div>
            <div class="about-text slide-in-right">
                <h2>Who We Are</h2>
                <p>
                    Founded with a passion for precision and creativity, Future Colours has grown into a leading provider of branding and signage solutions in the UAE. Our core mission is to transform your brand's vision into tangible, high-impact reality.
                </p>
                <p>
                    We believe in building lasting partnerships with our clients, founded on trust, quality, and a shared commitment to excellence.
                </p>
            </div>
        </div>
    </section> -->

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
                    Founded with a passion for precision and creativity, Future Colours has grown into a leading provider of branding and signage solutions in the UAE. Our core mission is to transform your brand's vision into tangible, high-impact reality.
                </p>
                <p>
                    We believe in building lasting partnerships with our clients, founded on trust, quality, and a shared commitment to excellence.
                </p>
            </div>
        </div>
    </section>

    <section class="offer-section section fade-in">
        <div class="container">
            <h2 class="section-title" style="color: var(--white);">What We Do</h2>
            <p class="section-subtitle" style="text-align: center;">We specialize in a comprehensive range of services designed to meet all your branding needs, from initial concept to final installation.</p>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-lightbulb"></i></div>
                    <h3>Brand Strategy</h3>
                    <p>Developing a cohesive brand identity that resonates with your target audience.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-pen-ruler"></i></div>
                    <h3>Signage Design</h3>
                    <p>Creating visually stunning and effective sign designs that capture attention.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-screwdriver-wrench"></i></div>
                    <h3>Manufacturing</h3>
                    <p>Utilizing state-of-the-art technology to produce durable, high-quality products.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section section fade-in">
        <div class="team-container">
            <div class="team-content-left">
                <h2 style="color: black; text-align: left;">Meet the Minds Behind the Brand</h2>
                <p style="color: black; text-align: left;">At Future Colours, our success is driven by a passionate team of creative designers, skilled technicians, and dedicated project managers. Each member brings unique expertise and innovative ideas to deliver exceptional signage solutions.</p>
                <p style="color: black; text-align: left;">Together, we collaborate to transform your vision into reality, ensuring every project reflects our commitment to quality and excellence.</p>
            </div>
            <div class="team-image-right">
                <?php
                // Get a team image from the about page folder
                $team_images = glob('res/general-images/about-page/team*.{jpg,jpeg,png}', GLOB_BRACE);
                if (!empty($team_images)) {
                    echo '<img src="' . $team_images[0] . '" alt="Our Team">';
                }
                ?>
            </div>
        </div>
    </section>

    <footer>
        <!-- Footer content will be loaded here by script.js -->
    </footer>
    
    <script src="script.js" defer></script>
</body>
</html>
