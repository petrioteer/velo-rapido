<?php
/**
 * Utility functions for Velo Rapido
 * 
 * Contains common functions used throughout the application
 */

// Helper function to get base URL for deployment
if (!function_exists('getBaseUrl')) {
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
}

// Function to check if user is logged in
if (!function_exists('requireLogin')) {
    function requireLogin() {
        $baseUrl = getBaseUrl();
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['error_message'] = "You must be logged in to access this page";
            header("Location: " . $baseUrl . "/auth/login.php");
            exit();
        }
    }
}

// Function to check if user is admin
if (!function_exists('requireAdmin')) {
    function requireAdmin() {
        $baseUrl = getBaseUrl();
        if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
            $_SESSION['error_message'] = "You must be an administrator to access this page";
            header("Location: " . $baseUrl . "/auth/login.php");
            exit();
        }
    }
}
?>