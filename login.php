<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Security: No input sanitization (SQL Injection)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Security: Directly embedding user input in SQL query
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        session_start();
        $_SESSION['user'] = $username;
        header('Location: index.php');
    } else {
        echo 'Invalid login credentials.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
        <!-- Accessibility: No labels for inputs -->
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
</body>
</html>
