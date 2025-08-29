<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: admin.php');
    exit;
}

$works_dir = 'res/works/';
$allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
$message = '';
$error = '';

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'upload':
                if (isset($_FILES['image'])) {
                    $file = $_FILES['image'];
                    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                    
                    if (in_array($ext, $allowed_types)) {
                        $new_name = uniqid() . '.' . $ext;
                        if (move_uploaded_file($file['tmp_name'], $works_dir . $new_name)) {
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
                if (isset($_POST['filename'])) {
                    $filename = basename($_POST['filename']);
                    $filepath = $works_dir . $filename;
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

// Get all images
$images = glob($works_dir . "*.{" . implode(',', $allowed_types) . "}", GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Works - FC Signs</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="manage-works.css">
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
            <h1>Manage Works</h1>
        </div>

        <?php if ($message): ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Upload Form -->
        <form class="upload-form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="upload">
            <div class="form-group">
                <label for="image">Upload New Image</label>
                <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.gif" required>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-upload"></i> Upload
            </button>
        </form>

        <!-- Image Grid -->
        <div class="image-grid">
            <?php foreach ($images as $image): ?>
                <div class="image-card">
                    <img src="<?php echo $image; ?>" alt="Work Image">
                    <div class="image-actions">
                        <form method="POST" style="display:inline">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="filename" value="<?php echo basename($image); ?>">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this image?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>