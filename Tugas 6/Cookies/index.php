<!DOCTYPE html>
<?php
    $cookie_duration = 86400;
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])){
        $expire = time() + $cookie_duration;
        setcookie('username', $_POST['name'], $expire);
        setcookie('email', $_POST['email'], $expire);
        setcookie('expire_time', $expire, $expire);
        header('Location: index.php');
    }

    if (isset($_POST['delete_cookie'])) {
        setcookie('username', '', time() - 3600);
        setcookie('email', '', time() - 3600);
        setcookie('expire_time', '', time() - 3600);
        header('Location: index.php');
    }

    $welcomeMessage = "Silahkan masukkan nama dan email Anda";
    if(isset($_COOKIE['username'])){
        $welcomeMessage = "Halo ".htmlspecialchars($_COOKIE['username'])." (".htmlspecialchars($_COOKIE['email']).")! Selamat datang kembali di sini.";

        if(isset($_COOKIE['expire_time'])){
            $expire_time = $_COOKIE['expire_time'];
            $time_left = $expire_time - time();
            $days_left = floor($time_left / (60 * 60 * 24));
            $hours_left = floor($time_left / (60 * 60)) - ($days_left * 24);
            $minutes_left = floor($time_left / 60) - ($days_left * 24 * 60) - ($hours_left * 60);

            $timeLeftMessage = "<br>Waktu cookie akan habis dalam $days_left hari, $hours_left jam, $minutes_left menit.";
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
    <title>Test Cookie</title>
</head>
<body>
    <header>
        <h1>Test Cookie</h1>
    </header>
    <section>
        <div class="container">
            <p><?php echo $welcomeMessage; ?></p>

            <?php if (!empty($timeLeftMessage)): ?>
                <p><?php echo $timeLeftMessage; ?></p>
            <?php endif; ?>

            <?php if (!isset($_COOKIE['username'])): ?>
            <form method="post" action="">
                <label for="nameInput">Masukkan Nama: </label>
                <input type="text" id="nameInput" name="name" required>
                
                <label for="emailInput">Masukkan Email: </label>
                <input type="email" id="emailInput" name="email" required>
                
                <button type="submit">Submit</button>
            </form>
            <?php endif; ?>

            <?php if (isset($_COOKIE['username'])): ?>
            <form method="post" action="">
                <h2>Perbarui Cookie</h2>
                <label for="nameInput">Nama: </label>
                <input type="text" id="nameInput" name="name" value="<?php echo htmlspecialchars($_COOKIE['username']); ?>" required>
                
                <label for="emailInput">Email: </label>
                <input type="email" id="emailInput" name="email" value="<?php echo htmlspecialchars($_COOKIE['email']); ?>" required>
                
                <button type="submit">Perbarui</button>
            </form>

            <form method="post" action="">
                <input type="hidden" name="delete_cookie" value="1">
                <button type="submit">Hapus Cookie</button>
            </form>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>