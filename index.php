<?php
include 'db.php';

// Security: No prepared statements, vulnerable to SQL Injection
$query = "SELECT * FROM blogs";
$result = $conn->query($query);

// Reliability: No error handling for database issues
?>

<!DOCTYPE html>
<html>
<head>
    <!-- SEO: Missing meta tags, poor title -->
    <title>Blog App</title>
</head>
<body>
<a href="add_blog.php" style="display: inline-block; padding: 10px; background-color: blue; color: white; text-decoration: none; border-radius: 5px;">Add Blog</a>

    <h1>All Blogs</h1>

    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div>
                <!-- Performance: No lazy loading for images -->
                <img src="uploads/<?= $row['image']; ?>" alt="Blog Image">
                
                <!-- Security: XSS vulnerability -->
                <h2><?= $row['title']; ?></h2>
                <p><?= $row['content']; ?></p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No blogs available.</p>
    <?php endif; ?>
</body>
</html>
