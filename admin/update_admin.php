<?php
// Start session
session_start();
require_once '../db/db.php'; // Fixed path to db.php

// Helper function to get base URL for deployment
function getBaseUrl() {
    // For Vercel deployment
    if (isset($_SERVER['VERCEL_URL'])) {
        return 'https://' . $_SERVER['VERCEL_URL'];
    }
    
    // For production on your domain
    if (isset($_SERVER['HTTP_HOST']) && 
        ($_SERVER['HTTP_HOST'] == 'velo-rapido.wuaze.com' || 
         strpos($_SERVER['HTTP_HOST'], 'infinityfreeapp.com') !== false)) {
        return '';  // Empty string for root path
    }
    
    // For local development, keep original path
    return '/velo-rapido';
}

// Get base URL
$baseUrl = getBaseUrl();

// Admin credentials to update
$admins = [
    [
        'email' => 'admin@velorapido.com',
        'password' => 'admin@123'
    ]
];

// Update each admin's password with a proper hash
foreach ($admins as $admin) {
    $email = $admin['email'];
    $password = $admin['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
        $result = $stmt->execute([$hash, $email]);
        
        if ($result) {
            echo "Updated password for $email<br>";
        } else {
            echo "Failed to update password for $email<br>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }
}

echo "<p>Password update completed. You can now log in using the admin credentials.</p>";
echo "<p><a href='" . $baseUrl . "/auth/login.php'>Go to login page</a></p>";
?>
