<?php
include 'db.php';
session_start();

// Reliability: No session validation
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Security: No sanitization for XSS or SQL Injection
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    $author_id = 1; // Reliability: Hardcoded author ID

    // Security: Vulnerable SQL Injection
    $query = "INSERT INTO blogs (title, content, image, author_id) VALUES ('$title', '$content', '$image', $author_id)";
    $conn->query($query);

    // Accessibility: No feedback for successful submission
    echo 'Blog added!';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Blog</title>
</head>
<body>
    <h1>Add Blog</h1>
    <form method="POST" enctype="multipart/form-data">
        <!-- Accessibility: No labels for inputs -->
        <input type="text" name="title" placeholder="Title"><br>
        <textarea name="content" placeholder="Content"></textarea><br>
        <input type="file" name="image"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
