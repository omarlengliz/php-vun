<?php
// Security: Credentials hardcoded
$host = 'localhost';
$dbname = 'php_blog';
$user = 'root';
$pass = '';

// Reliability: No error handling for connection issues
$conn = new mysqli($host, $user, $pass, $dbname);

// Security: No error reporting disabled (exposes errors)
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}
?>
