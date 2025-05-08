<?php
/**
 * API endpoint for Velo Rapido
 * This file exists to satisfy Vercel's function pattern requirements
 */

header('Content-Type: application/json');

// Return basic application info
echo json_encode([
    'application' => 'Velo Rapido',
    'version' => '1.0.0',
    'status' => 'operational',
    'timestamp' => date('Y-m-d H:i:s')
]);
?>