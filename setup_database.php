<?php
/**
 * Database import script for Velo Rapido
 * 
 * This script imports the database schema into FreeSQLDatabase
 */

// Include database connection
require_once 'db/db.php';

// Display header information
echo "<h1>Velo Rapido Database Setup</h1>";
echo "<p>Starting database import process...</p>";

// Read the SQL file
$sql = file_get_contents('db/velo_rapido.sql');

// Split SQL by semicolon to get individual queries
$queries = explode(';', $sql);

// Execute each query
$successCount = 0;
$errorCount = 0;

echo "<div style='font-family: monospace; background: #f5f5f5; padding: 20px; border-radius: 5px;'>";
echo "Starting database import...<br>";

foreach ($queries as $query) {
    $query = trim($query);
    
    // Skip empty queries
    if (empty($query)) continue;
    
    try {
        $result = $pdo->exec($query);
        echo "<span style='color: green;'>✓ Success:</span> " . htmlspecialchars(substr($query, 0, 50)) . "...<br>";
        $successCount++;
    } catch (PDOException $e) {
        echo "<span style='color: red;'>✗ Error:</span> " . htmlspecialchars($e->getMessage()) . "<br>";
        echo "<span style='color: #888;'>Query:</span> " . htmlspecialchars(substr($query, 0, 100)) . "...<br>";
        $errorCount++;
    }
}

echo "<hr><p>Import completed with $successCount successful queries and $errorCount errors.</p>";

// Check if critical tables exist
$requiredTables = ['users', 'bikes', 'reservations', 'payments'];
$missingTables = [];

foreach ($requiredTables as $table) {
    try {
        $result = $pdo->query("SELECT 1 FROM $table LIMIT 1");
    } catch (PDOException $e) {
        $missingTables[] = $table;
    }
}

if (empty($missingTables)) {
    echo "<p style='color: green;'>All required tables were created successfully.</p>";
} else {
    echo "<p style='color: red;'>Warning: The following tables are missing: " . implode(', ', $missingTables) . "</p>";
}

echo "</div>";

echo "<p><a href='index.php'>Return to homepage</a></p>";
?>