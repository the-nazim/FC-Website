<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - FC Signs</title>
    <link rel="stylesheet" href="services.css">
</head>
<body>
    <!-- <header>

    </header> -->

    <div class="services-container">
        <h1 class="main-title animate-fade-in">Our Services</h1>
        <?php
        // Define service categories and their folders
        $services = [
            'signage-solutions' => [
                'title' => 'Signage Solutions',
                'description' => 'Professional signage solutions for your business needs.'
            ],
            'acrylic-products' => [
                'title' => 'Acrylic Products',
                'description' => 'High-quality acrylic products and displays.'
            ],
            'wall-graphics' => [
                'title' => 'Wall Graphics',
                'description' => 'Creative wall graphics and decorative solutions.'
            ],
            'printing-solutions' => [
                'title' => 'Printing Solutions',
                'description' => 'Professional printing services for all your requirements.'
            ],
            'promotional-display' => [
                'title' => 'Promotional Display',
                'description' => 'Eye-catching promotional displays and materials.'
            ],
            'hoarding-banner' => [
                'title' => 'Hoarding & Banner',
                'description' => 'Large format hoarding and banner solutions.'
            ],
            'additional-services' => [
                'title' => 'Additional Services',
                'description' => 'Complementary services to meet all your signage needs.'
            ]
        ];

        foreach ($services as $folder => $service) {  // Changed $index to $folder
            $image_path = "res/services/{$folder}/";
            $images = glob($image_path . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
            
            if (!empty($images)) {
                $layout_class = array_search($folder, array_keys($services)) % 2 === 0 ? 'image-left' : 'image-right';
                $animation_class = array_search($folder, array_keys($services)) % 2 === 0 ? 'animate-slide-right' : 'animate-slide-left';
                ?>
                <section class="service-section <?php echo $layout_class; ?>" id="<?php echo $folder; ?>">
                    <div class="service-content-wrapper <?php echo $animation_class; ?>">
                        <div class="service-slideshow">
                            <div class="slides-wrapper">
                                <?php
                                // Create two sets of cards for infinite loop
                                for ($set = 0; $set < 2; $set++) {
                                    echo '<div class="service-card-grid">';
                                    foreach ($images as $index => $image) {
                                        ?>
                                            <img src="<?php echo $image; ?>" alt="<?php echo $service['title']; ?>">
                                        <!-- <div class="service-card">
                                            <div class="card-content">
                                                <h3><?php echo $service['title'] . ' ' . ($index + 1); ?></h3>
                                                <p>View Details →</p>
                                            </div>
                                        </div> -->
                                        <?php
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="service-content">
                            <h2><?php echo $service['title']; ?></h2>
                            <p><?php echo $service['description']; ?></p>
                            <a href="#" class="learn-more">Learn More →</a>
                        </div>
                    </div>
                </section>
                <?php
            }
        }
        ?>
    </div>
<!-- 
    <footer>
    </footer> -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intersection Observer for animations
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.2
            });

            // Observe all animated elements
            document.querySelectorAll('.animate-slide-left, .animate-slide-right, .animate-fade-in')
                .forEach(el => observer.observe(el));

            // Initialize slideshows
            document.querySelectorAll('.service-slideshow').forEach(slideshow => {
                const wrapper = slideshow.querySelector('.slides-wrapper');
                const slides = wrapper.querySelectorAll('.slide');
                const slideWidth = 100;
                let currentPosition = 0;

                // Set initial positions
                slides.forEach((slide, index) => {
                    slide.style.left = `${index * 100}%`;
                });

                // Automatic slideshow
                function moveSlides() {
                    currentPosition++;
                    wrapper.style.transform = `translateX(-${currentPosition * slideWidth}%)`;
                    wrapper.style.transition = 'transform 0.5s ease';

                    // Reset position for seamless loop
                    if (currentPosition >= slides.length - 2) {
                        setTimeout(() => {
                            wrapper.style.transition = 'none';
                            currentPosition = 0;
                            wrapper.style.transform = `translateX(0)`;
                        }, 500);
                    }
                }

                setInterval(moveSlides, 3000);
            });
        });
    </script>
</body>
</html>