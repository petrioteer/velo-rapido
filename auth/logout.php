<?php
session_start();
require_once '../includes/utils.php';

// Get base URL
$baseUrl = getBaseUrl();

// Clear all session variables
$_SESSION = array();

// If a session cookie is used, destroy it
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session
session_destroy();

// Redirect to login page
header("Location: " . $baseUrl . "/auth/login.php");
exit();
?>