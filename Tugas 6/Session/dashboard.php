<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <p>Halo, <?php echo htmlspecialchars($username); ?>! Anda sudah login.</p>
        <a href="index.php?logout=true">Logout</a>
    </div>
</body>
</html>
