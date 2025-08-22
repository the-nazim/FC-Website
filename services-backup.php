<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Future Colours</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <!-- Header content will be loaded here by script.js -->
    </header>

    <section class="hero hero-inner">
        <div class="hero-slide" style="background-image: url('https://placehold.co/1920x1080/166534/ffffff?text=Our+Services');"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Our Services</h1>
            <p>Delivering excellence and innovation in every project.</p>
        </div>
    </section>

    <main class="services-page-content">

        <!-- Service 4: Wall Displays -->
        <section class="service-display-section section split-layout">
            <div class="container">
                <div class="service-display-container">
                    <div class="service-text-content fade-in">
                        <h2>Wall Graphics</h2>
                        <p>
                            At SignWood, we specialize in designing, producing, and delivering high-impact promotional display solutions that enhance brand visibility and create lasting impressions. Our expertise spans a wide range of display products, including roll-ups, pop-up stands, modular displays, backdrops, and customized branding materials tailored to suit every event and marketing need. We combine creativity, quality craftsmanship, and innovative design to ensure that each display not only stands out visually but also effectively communicates your brand message. Whether for exhibitions, corporate events, retail promotions, or marketing activations, we provide end-to-end services — from design consultation to production and on-site setup.
With a strong focus on quality, timely delivery, and customer satisfaction, SignWood is the trusted partner for businesses looking to make a strong, professional impact through visually compelling promotional displays.
                        </p>
                    </div>
                    <div class="service-slideshow fade-in">
                        <div class="slides-wrapper">
                            <?php
                                $folder_name = 'wall-graphics';
                                $placeholder_text = 'Wall Graphics';
                                $server_image_folder = __DIR__ . '/res/services/' . $folder_name . '/';
                                $web_image_folder = 'res/services/' . $folder_name . '/';
                                $images = glob($server_image_folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                if ($images !== false && !empty($images)) {
                                    foreach ($images as $image_path) {
                                        $filename = basename($image_path);
                                        $web_path = $web_image_folder . $filename;
                                        echo '<div class="service-slide"><img src="' . htmlspecialchars($web_path) . '" alt="' . htmlspecialchars($placeholder_text) . ' project image"></div>';
                                    }
                                } else {
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/4b5563/ffffff?text=' . urlencode($placeholder_text) . '" alt="' . htmlspecialchars($placeholder_text) . ' Example"></div>';
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/6b7280/ffffff?text=' . urlencode($placeholder_text) . ' 2" alt="' . htmlspecialchars($placeholder_text) . ' Example 2"></div>';
                                }
                            ?>
                        </div>
                        <!-- <button class="slide-arrow prev"><i class="fas fa-chevron-left"></i></button> -->
                        <!-- <button class="slide-arrow next"><i class="fas fa-chevron-right"></i></button> -->
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Service 2: Printing Solutions -->
        <section class="service-display-section section split-layout">
            <div class="container">
                <div class="service-display-container">
                    <div class="service-text-content fade-in">
                        <h2>Printing Solutions</h2>
                        <p>
                            Turn your fleet into mobile billboards with our high-quality vehicle graphics and full wraps. Using state-of-the-art printing technology and durable vinyl, we create eye-catching designs that boost brand visibility and withstand the elements, offering a fantastic return on investment.
                        </p>
                    </div>
                    <div class="service-slideshow fade-in">
                        <div class="slides-wrapper">
                            <?php
                                $folder_name = 'printing-solutions';
                                $placeholder_text = 'Printing Solutions';
                                $server_image_folder = __DIR__ . '/res/services/' . $folder_name . '/';
                                $web_image_folder = 'res/services/' . $folder_name . '/';
                                $images = glob($server_image_folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                if ($images !== false && !empty($images)) {
                                    foreach ($images as $image_path) {
                                        $filename = basename($image_path);
                                        $web_path = $web_image_folder . $filename;
                                        echo '<div class="service-slide"><img src="' . htmlspecialchars($web_path) . '" alt="' . htmlspecialchars($placeholder_text) . ' project image"></div>';
                                    }
                                } else {
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/4b5563/ffffff?text=Vehicle+Wrap" alt="Vehicle Wrap Example"></div>';
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/6b7280/ffffff?text=Vehicle+Wrap+2" alt="Vehicle Wrap Example 2"></div>';
                                }
                            ?>
                        </div>
                        <!-- <button class="slide-arrow prev"><i class="fas fa-chevron-left"></i></button>
                        <button class="slide-arrow next"><i class="fas fa-chevron-right"></i></button> -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Service 3: Acrylic Displays -->
        <section class="service-display-section section split-layout">
            <div class="container">
                <div class="service-display-container">
                    <div class="service-text-content fade-in">
                        <h2>Acrylic Displays</h2>
                        <p>
                            We specialize in creating inviting and professional retail environments. Our services include everything from window graphics and fascia signs to complete interior branding solutions. We help you attract customers and create a memorable in-store experience that reflects your brand's identity.
                        </p>
                    </div>
                    <div class="service-slideshow fade-in">
                        <div class="slides-wrapper">
                            <?php
                                $folder_name = 'acrylic-products';
                                $placeholder_text = 'Acrylic Displays';
                                $server_image_folder = __DIR__ . '/res/services/' . $folder_name . '/';
                                $web_image_folder = 'res/services/' . $folder_name . '/';
                                $images = glob($server_image_folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                if ($images !== false && !empty($images)) {
                                    foreach ($images as $image_path) {
                                        $filename = basename($image_path);
                                        $web_path = $web_image_folder . $filename;
                                        echo '<div class="service-slide"><img src="' . htmlspecialchars($web_path) . '" alt="' . htmlspecialchars($placeholder_text) . ' project image"></div>';
                                    }
                                } else {
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/15803d/ffffff?text=Retail+Front" alt="Retail Front Example"></div>';
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/16a34a/ffffff?text=Retail+Front+2" alt="Retail Front Example 2"></div>';
                                }
                            ?>
                        </div>
                        <!-- <button class="slide-arrow prev"><i class="fas fa-chevron-left"></i></button> -->
                        <!-- <button class="slide-arrow next"><i class="fas fa-chevron-right"></i></button> -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Service 4: Wall Displays -->
        <section class="service-display-section section split-layout">
            <div class="container">
                <div class="service-display-container">
                    <div class="service-text-content fade-in">
                        <h2>Wall Graphics</h2>
                        <p>
                            For unique projects that require a creative and technical touch, our wall graphics service delivers bespoke solutions tailored to your specific needs, from artistic installations to functional structures.
                        </p>
                    </div>
                    <div class="service-slideshow fade-in">
                        <div class="slides-wrapper">
                            <?php
                                $folder_name = 'wall-graphics';
                                $placeholder_text = 'Wall Graphics';
                                $server_image_folder = __DIR__ . '/res/services/' . $folder_name . '/';
                                $web_image_folder = 'res/services/' . $folder_name . '/';
                                $images = glob($server_image_folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                if ($images !== false && !empty($images)) {
                                    foreach ($images as $image_path) {
                                        $filename = basename($image_path);
                                        $web_path = $web_image_folder . $filename;
                                        echo '<div class="service-slide"><img src="' . htmlspecialchars($web_path) . '" alt="' . htmlspecialchars($placeholder_text) . ' project image"></div>';
                                    }
                                } else {
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/4b5563/ffffff?text=' . urlencode($placeholder_text) . '" alt="' . htmlspecialchars($placeholder_text) . ' Example"></div>';
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/6b7280/ffffff?text=' . urlencode($placeholder_text) . ' 2" alt="' . htmlspecialchars($placeholder_text) . ' Example 2"></div>';
                                }
                            ?>
                        </div>
                        <!-- <button class="slide-arrow prev"><i class="fas fa-chevron-left"></i></button> -->
                        <!-- <button class="slide-arrow next"><i class="fas fa-chevron-right"></i></button> -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Service 5: LED & Neon Signs -->
        <section class="service-display-section section split-layout">
            <div class="container">
                <div class="service-display-container">
                    <div class="service-text-content fade-in">
                        <h2>Promotional Displays</h2>
                        <p>
                            Brighten up your brand with our vibrant and energy-efficient LED and classic neon signs. Perfect for creating a memorable ambiance and attracting attention, day or night.
                        </p>
                    </div>
                    <div class="service-slideshow fade-in">
                        <div class="slides-wrapper">
                            <?php
                                $folder_name = 'promotional-display';
                                $placeholder_text = 'Promotional Displays';
                                $server_image_folder = __DIR__ . '/res/services/' . $folder_name . '/';
                                $web_image_folder = 'res/services/' . $folder_name . '/';
                                $images = glob($server_image_folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                if ($images !== false && !empty($images)) {
                                    foreach ($images as $image_path) {
                                        $filename = basename($image_path);
                                        $web_path = $web_image_folder . $filename;
                                        echo '<div class="service-slide"><img src="' . htmlspecialchars($web_path) . '" alt="' . htmlspecialchars($placeholder_text) . ' project image"></div>';
                                    }
                                } else {
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/9a3412/ffffff?text=LED+Sign" alt="LED Sign Example"></div>';
                                }
                            ?>
                        </div>
                        <!-- <button class="slide-arrow prev"><i class="fas fa-chevron-left"></i></button> -->
                        <!-- <button class="slide-arrow next"><i class="fas fa-chevron-right"></i></button> -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Service 6: Hoarding Banners -->
        <section class="service-display-section section split-layout">
            <div class="container">
                <div class="service-display-container">
                    <div class="service-text-content fade-in">
                        <h2>Hoarding & Construction Site Signage</h2>
                        <p>
                            Guide your visitors effectively with our clear and intuitive wayfinding systems. Ideal for corporate campuses, hospitals, shopping malls, and large residential complexes.
                        </p>
                    </div>
                    <div class="service-slideshow fade-in">
                        <div class="slides-wrapper">
                            <?php
                                $folder_name = 'hoarding-banner';
                                $placeholder_text = 'Hoarding Banners';
                                $server_image_folder = __DIR__ . '/res/services/' . $folder_name . '/';
                                $web_image_folder = 'res/services/' . $folder_name . '/';
                                $images = glob($server_image_folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                if ($images !== false && !empty($images)) {
                                    foreach ($images as $image_path) {
                                        $filename = basename($image_path);
                                        $web_path = $web_image_folder . $filename;
                                        echo '<div class="service-slide"><img src="' . htmlspecialchars($web_path) . '" alt="' . htmlspecialchars($placeholder_text) . ' project image"></div>';
                                    }
                                } else {
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/44403c/ffffff?text=Wayfinding" alt="Wayfinding Sign Example"></div>';
                                }
                            ?>
                        </div>
                        <!-- <button class="slide-arrow prev"><i class="fas fa-chevron-left"></i></button> -->
                        <!-- <button class="slide-arrow next"><i class="fas fa-chevron-right"></i></button> -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Service 7: Exhibition & Event Displays -->
        <!-- <section class="service-display-section section split-layout">
            <div class="container">
                <div class="service-display-container">
                    <div class="service-text-content fade-in">
                        <h2>Exhibition & Event Displays</h2>
                        <p>
                            Make a lasting impression at your next trade show or event with our custom-designed booths, banners, and displays. We create portable and impactful solutions to showcase your brand.
                        </p>
                    </div>
                    <div class="service-slideshow fade-in">
                        <div class="slides-wrapper">
                            <?php
                                $folder_name = 'event-displays';
                                $placeholder_text = 'Event Displays';
                                $server_image_folder = __DIR__ . '/res/services/' . $folder_name . '/';
                                $web_image_folder = 'res/services/' . $folder_name . '/';
                                $images = glob($server_image_folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                if ($images !== false && !empty($images)) {
                                    foreach ($images as $image_path) {
                                        $filename = basename($image_path);
                                        $web_path = $web_image_folder . $filename;
                                        echo '<div class="service-slide"><img src="' . htmlspecialchars($web_path) . '" alt="' . htmlspecialchars($placeholder_text) . ' project image"></div>';
                                    }
                                } else {
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/1e40af/ffffff?text=Exhibition" alt="Exhibition Example"></div>';
                                }
                            ?>
                        </div>
                        <button class="slide-arrow prev"><i class="fas fa-chevron-left"></i></button>
                        <button class="slide-arrow next"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- Service 8: Additional Services -->
        <section class="service-display-section section split-layout">
            <div class="container">
                <div class="service-display-container">
                    <div class="service-text-content fade-in">
                        <h2>Additional Services</h2>
                        <p>
                            Utilize your window space for branding, promotions, or privacy. We offer everything from full-color graphics to elegant frosted vinyl for a sophisticated look.
                        </p>
                    </div>
                    <div class="service-slideshow fade-in">
                        <div class="slides-wrapper">
                            <?php
                                $folder_name = 'additional-services';
                                $placeholder_text = 'Additional Services';
                                $server_image_folder = __DIR__ . '/res/services/' . $folder_name . '/';
                                $web_image_folder = 'res/services/' . $folder_name . '/';
                                $images = glob($server_image_folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                if ($images !== false && !empty($images)) {
                                    foreach ($images as $image_path) {
                                        $filename = basename($image_path);
                                        $web_path = $web_image_folder . $filename;
                                        echo '<div class="service-slide"><img src="' . htmlspecialchars($web_path) . '" alt="' . htmlspecialchars($placeholder_text) . ' project image"></div>';
                                    }
                                } else {
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/be185d/ffffff?text=Window+Graphic" alt="Window Graphic Example"></div>';
                                }
                            ?>
                        </div>
                        <button class="slide-arrow prev"><i class="fas fa-chevron-left"></i></button>
                        <button class="slide-arrow next"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Service 9: Hoarding & Construction Site Signage -->
        <!-- <section class="service-display-section section split-layout">
            <div class="container">
                <div class="service-display-container">
                    <div class="service-text-content fade-in">
                        <h2>Hoarding & Construction Site Signage</h2>
                        <p>
                            Secure your site and promote your project with our durable and high-impact construction hoarding graphics and safety signage.
                        </p>
                    </div>
                    <div class="service-slideshow fade-in">
                        <div class="slides-wrapper">
                            <?php
                                $folder_name = 'hoarding';
                                $placeholder_text = 'Hoarding Signage';
                                $server_image_folder = __DIR__ . '/res/services/' . $folder_name . '/';
                                $web_image_folder = 'res/services/' . $folder_name . '/';
                                $images = glob($server_image_folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                if ($images !== false && !empty($images)) {
                                    foreach ($images as $image_path) {
                                        $filename = basename($image_path);
                                        $web_path = $web_image_folder . $filename;
                                        echo '<div class="service-slide"><img src="' . htmlspecialchars($web_path) . '" alt="' . htmlspecialchars($placeholder_text) . ' project image"></div>';
                                    }
                                } else {
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/ca8a04/ffffff?text=Hoarding" alt="Hoarding Example"></div>';
                                }
                            ?>
                        </div>
                        <button class="slide-arrow prev"><i class="fas fa-chevron-left"></i></button>
                        <button class="slide-arrow next"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- Service 10: Digital Signage Solutions -->
        <!-- <section class="service-display-section section split-layout">
            <div class="container">
                <div class="service-display-container">
                    <div class="service-text-content fade-in">
                        <h2>Digital Signage Solutions</h2>
                        <p>
                            Step into the future with dynamic digital displays. We provide complete solutions including hardware, software, and content management for interactive and engaging customer experiences.
                        </p>
                    </div>
                    <div class="service-slideshow fade-in">
                        <div class="slides-wrapper">
                            <?php
                                $folder_name = 'digital-signage';
                                $placeholder_text = 'Digital Signage';
                                $server_image_folder = __DIR__ . '/res/services/' . $folder_name . '/';
                                $web_image_folder = 'res/services/' . $folder_name . '/';
                                $images = glob($server_image_folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                if ($images !== false && !empty($images)) {
                                    foreach ($images as $image_path) {
                                        $filename = basename($image_path);
                                        $web_path = $web_image_folder . $filename;
                                        echo '<div class="service-slide"><img src="' . htmlspecialchars($web_path) . '" alt="' . htmlspecialchars($placeholder_text) . ' project image"></div>';
                                    }
                                } else {
                                    echo '<div class="service-slide"><img src="https://placehold.co/400x300/65a30d/ffffff?text=Digital+Screen" alt="Digital Signage Example"></div>';
                                }
                            ?>
                        </div>
                        <button class="slide-arrow prev"><i class="fas fa-chevron-left"></i></button>
                        <button class="slide-arrow next"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </section> -->

    </main>

    <footer>
        <!-- Footer content will be loaded here by script.js -->
    </footer>
    
    <script src="script.js" defer></script>
</body>
</html>