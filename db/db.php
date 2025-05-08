<?php
/**
 * Database connection and helper functions for Velo Rapido
 */

// Database connection parameters
$host = getenv('DB_HOST') ?: 'sql12.freesqldatabase.com';
$db = getenv('DB_NAME') ?: 'sql12777605';
$user = getenv('DB_USER') ?: 'sql12777605';
$pass = getenv('DB_PASS') ?: 'JUBzq4E64M';
$charset = 'utf8mb4';

// DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Create PDO instance
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // Log the error but don't expose details to the user
    error_log('Connection Error: ' . $e->getMessage());
    die('Database connection failed. Please try again later.');
}

// Helper functions
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// New helper function for updating records
function updateRecord($pdo, $table, $data, $whereColumn, $whereValue) {
    // Add updated_at to the data if the column exists in the table
    try {
        $columns = $pdo->query("SHOW COLUMNS FROM $table")->fetchAll(PDO::FETCH_COLUMN);
        if (in_array('updated_at', $columns)) {
            $data['updated_at'] = date('Y-m-d H:i:s');
        }
    } catch (PDOException $e) {
        // If the table doesn't exist or columns can't be fetched, continue without updated_at
    }
    
    // Build the SET clause
    $setClauses = [];
    $params = [];
    foreach ($data as $column => $value) {
        $setClauses[] = "$column = :$column";
        $params[":$column"] = $value;
    }
    $setClause = implode(', ', $setClauses);
    
    // Add WHERE parameter
    $params[":whereValue"] = $whereValue;
    
    // Build and execute the query
    $sql = "UPDATE $table SET $setClause WHERE $whereColumn = :whereValue";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($params);
}

// Authentication helper functions
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

function requireLogin() {
    if (!isLoggedIn()) {
        $_SESSION['error_message'] = "You must be logged in to access this page.";
        header("Location: ../auth/login.php");
        exit();
    }
}

function requireAdmin() {
    if (!isLoggedIn() || !isAdmin()) {
        $_SESSION['error_message'] = "You don't have permission to access this page.";
        header("Location: ../index.php");
        exit();
    }
}
?>