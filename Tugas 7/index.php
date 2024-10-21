<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleForm.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
    <title>Database Mahasiswa | Login</title>
</head>
<body>
    <header>
        <nav>
            <ul class="nav_links">
                <li><strong>Database Mahasiswa</strong></li>
                <li id="login"><a href="index.php">Login</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <div class="container">
            <h3>Login</h3>
            <form action="login.php" method="POST" >
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </section>
</body>
</html>