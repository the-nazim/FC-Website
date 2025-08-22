<?php
// --- Configuration for the Gallery ---

// Define the path for the SERVER to find the images.
// Using __DIR__ makes the path relative to this file, which is more portable.
$server_image_folder = __DIR__ . '/res/works/';

// Define the path for the BROWSER to load the images.
// This must be a web-accessible URL path from the root of your site.
$web_image_folder = 'res/works/';

// Define the metadata for each image.
// To add a new project:
// 1. Upload the image to the 'res/works/' folder.
// 2. Add a new entry to this array with the filename as the key.
$gallery_metadata = [
    "project-alpha.jpg" => [
        "title" => "Client: Example Corp",
        "description" => "The 3D signage transformed our storefront. Exceptional quality!",
        "alt" => "3D Signage for Example Corp"
    ],
    "project-beta.jpg" => [
        "title" => "Project Beta",
        "description" => "A sleek and modern vehicle wrap.",
        "alt" => "Vehicle wrap project"
    ],
    "project-gamma.jpg" => [
        "title" => "Vehicle Wrap for 'The Boutique'",
        "description" => "A full vehicle wrap that turns heads on the road.",
        "alt" => "Project Gamma"
    ],
    "project-delta.jpg" => [
        "title" => "Retail Frontage",
        "description" => "Complete retail branding solution including window graphics and fascia.",
        "alt" => "Project Delta"
    ],
    "project-epsilon.jpg" => [
        "title" => "", // An empty title will not be displayed
        "description" => "", // An empty description will not be displayed
        "alt" => "Project Epsilon"
    ],
    "project-zeta.jpg" => [
        "title" => "Custom Fabrication",
        "description" => "A bespoke acrylic installation for a corporate lobby.",
        "alt" => "Project Zeta"
    ],
];

// Get all image files from the folder.
$images = glob($server_image_folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Works - Future Colours</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <!-- Header content will be loaded here by script.js -->
    </header>

    <section class="hero hero-inner">
        <div class="hero-slide" style="background-image: url('https://placehold.co/1920x1080/3730a3/ffffff?text=Our+Works');"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Our Works</h1>
            <p>A showcase of our commitment to quality and creativity.</p>
        </div>
    </section>

    <main class="gallery-page-content section">
        <div class="container">
            <div class="gallery-grid">
                <?php if (!empty($images)): ?>
                    <?php foreach ($images as $image_path): ?>
                        <?php
                            $filename = basename($image_path);
                            // Construct the correct web path for the <img> src attribute
                            $web_path = $web_image_folder . $filename;
                            $meta = $gallery_metadata[$filename] ?? ['title' => '', 'description' => '', 'alt' => 'Gallery Image'];
                        ?>
                        <div class="gallery-item">
                            <img src="<?= htmlspecialchars($web_path) ?>" alt="<?= htmlspecialchars($meta['alt']) ?>">
                            <div class="gallery-item-overlay">
                                <?php if (!empty($meta['title'])): ?><h3><?= htmlspecialchars($meta['title']) ?></h3><?php endif; ?>
                                <?php if (!empty($meta['description'])): ?><p><?= htmlspecialchars($meta['description']) ?></p><?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align: center; width: 100%; font-size: 1.2rem; color: var(--text-secondary);">No projects found in the gallery.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer>
        <!-- Footer content will be loaded here by script.js -->
    </footer>
    
    <script src="script.js" defer></script>
</body>
</html>