<?php
/**
 * Vercel PHP Entry Point
 * 
 * This file serves as the entry point for all requests handled by Vercel
 * It determines which file to serve based on the requested URI
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get the request URI from Vercel
$uri = $_SERVER['REQUEST_URI'];

// Remove query string from URI if present
if (($pos = strpos($uri, '?')) !== false) {
    $uri = substr($uri, 0, $pos);
}

// Remove trailing slash if it exists
$uri = rtrim($uri, '/');

// Set the document root to the parent directory
$_SERVER['DOCUMENT_ROOT'] = dirname(__DIR__);

// Map common paths directly
$pathMap = [
    '' => 'index.php',
    '/' => 'index.php',
    '/index' => 'index.php',
    '/login' => 'auth/login.php',
    '/register' => 'auth/register.php',
    '/logout' => 'auth/logout.php',
    '/fleet' => 'pages/fleet.php',
    '/book' => 'pages/book.php',
    '/dashboard' => 'pages/dashboard.php',
    '/report-damage' => 'pages/report-damage.php',
    '/payment' => 'pages/payment.php',
    '/admin' => 'admin/dashboard.php',
];

// Check if the URI is mapped
if (isset($pathMap[$uri])) {
    $filePath = $pathMap[$uri];
} else {
    // Try to find the requested file
    $filePath = ltrim($uri, '/');
    
    // If the file doesn't exist, default to index.php
    if (!file_exists(dirname(__DIR__) . '/' . $filePath)) {
        $filePath = 'index.php';
    }
}

// Include the requested file
require dirname(__DIR__) . '/' . $filePath;