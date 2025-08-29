<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: admin.php');
    exit;
}

$services_dir = 'res/services/';
$allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
$message = '';
$error = '';

// Get all service folders
$service_folders = array_filter(glob($services_dir . '*'), 'is_dir');

// Handle file upload and deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'upload':
                if (isset($_FILES['image']) && isset($_POST['folder'])) {
                    $folder = basename($_POST['folder']);
                    $target_dir = $services_dir . $folder . '/';
                    
                    $file = $_FILES['image'];
                    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                    
                    if (in_array($ext, $allowed_types)) {
                        $new_name = uniqid() . '.' . $ext;
                        if (move_uploaded_file($file['tmp_name'], $target_dir . $new_name)) {
                            $message = 'Image uploaded successfully!';
                        } else {
                            $error = 'Failed to upload image.';
                        }
                    } else {
                        $error = 'Invalid file type. Allowed types: ' . implode(', ', $allowed_types);
                    }
                }
                break;
                
            case 'delete':
                if (isset($_POST['filename']) && isset($_POST['folder'])) {
                    $folder = basename($_POST['folder']);
                    $filename = basename($_POST['filename']);
                    $filepath = $services_dir . $folder . '/' . $filename;
                    
                    if (file_exists($filepath) && unlink($filepath)) {
                        $message = 'Image deleted successfully!';
                    } else {
                        $error = 'Failed to delete image.';
                    }
                }
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Services - FC Signs</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="manage-contents.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Admin Navigation -->
    <nav class="admin-nav">
        <div class="nav-logo">
            <img src="res/FC_-_SIGNAGE-cropped__Small_-removebg-preview.png" alt="FC Signs Logo">
        </div>
        <div class="nav-right">
            <a href="admin.php" class="btn btn-primary btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <form action="logout.php" method="POST" style="margin:0;display:inline">
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="works-container">
        <div class="works-header">
            <h1>Manage Services</h1>
        </div>

        <?php if ($message): ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Service Folders Tabs -->
        <div class="service-tabs">
            <?php foreach ($service_folders as $index => $folder): ?>
                <div class="service-tab <?php echo $index === 0 ? 'active' : ''; ?>" 
                     data-folder="<?php echo basename($folder); ?>">
                    <?php echo str_replace('-', ' ', ucfirst(basename($folder))); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Service Folders Content -->
        <?php foreach ($service_folders as $index => $folder): 
            $folder_name = basename($folder);
            $images = glob($folder . "/*.{" . implode(',', $allowed_types) . "}", GLOB_BRACE);
        ?>
            <div class="folder-section" id="<?php echo $folder_name; ?>" 
                 style="display: <?php echo $index === 0 ? 'block' : 'none'; ?>">
                <div class="folder-header">
                    <h2 class="folder-title"><?php echo str_replace('-', ' ', $folder_name); ?></h2>
                    <button class="btn btn-primary btn-sm" onclick="toggleUpload('<?php echo $folder_name; ?>')">
                        <i class="fas fa-plus"></i> Add Images
                    </button>
                </div>

                <!-- Upload Form -->
                <form class="folder-upload" id="upload-<?php echo $folder_name; ?>" 
                      method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="upload">
                    <input type="hidden" name="folder" value="<?php echo $folder_name; ?>">
                    <div class="form-group">
                        <label>Upload New Image</label>
                        <input type="file" name="image" accept=".jpg,.jpeg,.png,.gif" required>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-upload"></i> Upload
                    </button>
                </form>

                <!-- Image Grid -->
                <div class="image-grid">
                    <?php foreach ($images as $image): ?>
                        <div class="image-card">
                            <img src="<?php echo $image; ?>" alt="Service Image">
                            <div class="image-actions">
                                <form method="POST" style="display:inline">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="folder" value="<?php echo $folder_name; ?>">
                                    <input type="hidden" name="filename" value="<?php echo basename($image); ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Are you sure you want to delete this image?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        // Tab switching
        document.querySelectorAll('.service-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                // Update active tab
                document.querySelectorAll('.service-tab').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                
                // Show selected folder
                const folder = tab.dataset.folder;
                document.querySelectorAll('.folder-section').forEach(section => {
                    section.style.display = section.id === folder ? 'block' : 'none';
                });
            });
        });

        // Toggle upload form
        function toggleUpload(folder) {
            const form = document.getElementById(`upload-${folder}`);
            form.classList.toggle('active');
        }
    </script>
</body>
</html>