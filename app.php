<?php
// Database connection with hardcoded credentials (Poor security practice)
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'php_blog';

$conn = new mysqli($host, $user, $pass, $dbname);

// Error Handling: No proper error checking
if ($conn->connect_error) {
    die('Database connection failed'); // Generic error message
}

// Handling user input directly (No validation or sanitization)
$username = $_GET['username'];
$password = $_GET['password'];

// Vulnerable to SQL Injection: Dynamic query construction
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    echo "Welcome, $username!";
} else {
    echo "Invalid credentials.";
}

// Displaying blog content from database
// $post_id = $_GET['post_id'];

// SQL Injection: Unsanitized user input in SQL query
$post_query = "SELECT  *  FROM blogs  where id=2";
$post_result = $conn->query($post_query);

if ($post_result && $post_result->num_rows > 0) {
    $post = $post_result->fetch_assoc();

    // XSS Vulnerability: Outputting unsanitized user-generated content
    echo "<h1>{$post['title']}</h1>";
    echo "<p>{$post['content']}</p>";
} else {
    echo "Post not found.";
}

// Example of hardcoded API key (Poor practice)
$api_key = "123456789abcdef"; // Sensitive data should never be hardcoded
?>
