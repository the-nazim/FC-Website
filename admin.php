<?php
session_start();

// Hardcoded credentials (temporary)
$valid_username = "admin";
$valid_password = "admin123";

// Check if user is logged in
if (!isset($_SESSION['logged_in'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if ($username === $valid_username && $password === $valid_password) {
            $_SESSION['logged_in'] = true;
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } else {
            $error = "Invalid credentials";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - FC Signs</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php if (!isset($_SESSION['logged_in'])): ?>
        <!-- Login Form -->
        <div class="login-container">
            <h2>Admin Login</h2>
            <?php if (isset($error)): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            <form class="login-form" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    <?php else: ?>
        <!-- Admin Navigation -->
        <nav class="admin-nav">
            <div class="nav-logo">
                <img src="res/FC_-_SIGNAGE-cropped__Small_-removebg-preview.png" alt="FC Signs Logo">
            </div>
            <div class="nav-right">
                <form action="logout.php" method="POST" style="margin:0">
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </nav>

        <!-- Admin Dashboard -->
        <div class="admin-container">
            <div class="admin-cards">
                <!-- Services Images -->
                <div class="admin-card">
                    <h3>Services Images</h3>
                    <p>Manage images for different service categories</p>
                    <a href="manage-services.php" class="btn btn-primary">Manage Services</a>
                </div>

                <!-- Works Images -->
                <div class="admin-card">
                    <h3>Works Images</h3>
                    <p>Manage previous works images</p>
                    <a href="manage-works.php" class="btn btn-primary">Manage Works</a>
                </div>
                
                <!-- General Images -->
                <div class="admin-card">
                    <h3>General Images</h3>
                    <p>Manage other website images</p>
                    <a href="manage-general.php" class="btn btn-primary">Manage Images</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>