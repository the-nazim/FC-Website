<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - FC Signs</title>
    <link rel="stylesheet" href="style.css">     <!-- Load style.css first -->
    <link rel="stylesheet" href="services.css">  <!-- Then load services.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <?php include 'header.html'; ?>
    </header>

    <div class="services-container">
        <h1 class="section-title animate-fade-in" style="color: #222831;">Our Services</h1>
        <?php
        // Define service categories and their folders
        $services = [
            'signage-solutions' => [
                'title' => 'Signage Solutions',
                'description' => 'At Future Colours, your trusted signage and branding partner in the UAE, we believe every brand deserves to stand out. With a passion for creativity and precision, we deliver end-to-end solutions from innovative design to flawless installation using high-quality materials that ensure lasting impact. Whether it’s guiding, informing, or showcasing your identity, our signage and branding services are crafted to make your message clear, professional, and unforgettable.'
            ],
            'acrylic-products' => [
                'title' => 'Acrylic Products',
                'description' => 'At Future Colours, we specialize in premium acrylic works designed to elevate your spaces with style and functionality. From custom displays and partitions to branding elements, our solutions are tailored to meet the unique demands of exhibitions, retail environments, offices, and events. Combining skilled craftsmanship, high-quality materials, and meticulous attention to detail, we create durable and visually striking acrylic products delivered on time and within budget.'
            ],
            'wall-graphics' => [
                'title' => 'Wall Graphics',
                'description' => 'At Future Colours, we offer creative wall graphics and decorative solutions that transform your spaces. Our team works closely with you to design and install stunning wall graphics that reflect your brand identity and enhance the overall aesthetic of your environment.'
            ],
            'printing-solutions' => [
                'title' => 'Printing Solutions',
                'description' => 'At Future Colours, our advanced digital printing technology allows us to deliver exceptional print and graphic solutions that combine quality, efficiency, and creativity. With the capability to print directly on substrates as well as roll-to-roll, we provide versatile and cost-effective options tailored to your needs. Whether you supply print-ready artwork or require fresh, custom designs, our team ensures every project is produced with precision, vibrancy, and impact.'
            ],
            'promotional-display' => [
                'title' => 'Promotional Display',
                'description' => 'At Future Colours, we design and manufacture high-quality product display stands that seamlessly blend creativity with functionality. From initial concept to final production, our team collaborates closely with clients to craft customized solutions that enhance product visibility while reflecting brand identity. By leveraging diverse materials and advanced production techniques, we deliver stands that are visually striking, durable, and practical—perfect for retail spaces, exhibitions, and promotional environments.'
            ],
            'hoarding-banner' => [
                'title' => 'Hoarding & Banner',
                'description' => 'At Future Colours, we provide large format hoarding and banner solutions that effectively promote your brand and message. Our team works with you to create eye-catching designs that are printed on high-quality materials, ensuring durability and impact in any setting.'
            ],
            'additional-services' => [
                'title' => 'Additional Services',
                'description' => 'At Future Colours, we go beyond creating signage by offering a full range of support services that add value and convenience. From maintenance to keep your brand vibrant, to efficient logistics for timely delivery, we handle every detail with care. We also produce high-quality name badges, provide secure storage and warehousing, and refurbish existing signage for a fresh new look. With a focus on quality and reliability, Future Colours is your trusted partner for complete signage and branding support.'
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
                            <h2 class="section-title-left"><?php echo $service['title']; ?></h2>
                            <p class="section-subtitle"><?php echo $service['description']; ?></p>
                            <a href="contact-us.html" class="learn-more" style="color: #555D66;">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </section>
                <?php
            }
        }
        ?>
    </div>

    <footer>
        <?php include 'footer.html'; ?>
    </footer>

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

        // Add mobile menu functionality
        document.querySelector('.mobile-menu-toggle').addEventListener('click', function() {
            this.classList.toggle('active');
            document.querySelector('.nav-links').classList.toggle('active');
        });
    </script>
</body>
</html>