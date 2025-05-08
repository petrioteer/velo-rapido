<?php
/**
 * Initialization script for Vercel deployment
 * This will be run during the build process
 */

// Display PHP version and loaded modules
echo "PHP Version: " . phpversion() . "\n";
echo "Loaded Extensions: " . implode(', ', get_loaded_extensions()) . "\n";

// Check database connection
try {
    require_once 'db/db.php';
    echo "Database connection successful\n";
    
    // Check if tables exist and create them if they don't
    $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
    
    if (empty($tables)) {
        echo "No tables found in database. Importing schema...\n";
        require_once 'setup_database.php';
    } else {
        echo "Tables found in database: " . implode(', ', $tables) . "\n";
    }
    
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage() . "\n";
    // Continue execution to allow Vercel to complete deployment
}

echo "Initialization complete\n";
?>