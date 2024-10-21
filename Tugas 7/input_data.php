<?php
    session_start();

    if($_SESSION['level'] != '2'){
        include "logout.php";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleForm.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
    <title>Database Mahasiswa | Input Data</title>
</head>
<body>
    <header>
        <nav>
            <ul class="nav_links">
                <li><strong>Database Mahasiswa</strong></li>
                <li id="login"><a href="logout.php" onclick="return confirm('Apakah Anda yakin ingin logout?');">Logout</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <div class="container">
            <h3>Input Data Mahasiswa</h3>
            <form action="input.php" method="POST">
                <p>NPM</p>
                <input type="text" name="npm" placeholder="Masukkan NPM Anda" required>
                <p>Nama</p>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap Anda" required>
                <p>Alamat</p>
                <textarea name="alamat" rows="3" cols="70" placeholder="Masukkan alamat lengkap Anda" required></textarea>
                <p>Tanggal Lahir</p>
                <input type="date" name="tgl_lhr" required>
                <p>Jenis Kelamin</p>
                <label for="jk">
                    <input type="radio" name="jk" value="L" required> Laki-laki
                    <input type="radio" name="jk" value="P" required> Perempuan
                </label>
                <p>Email</p>
                <input type="email" name="email" placeholder="contoh: abcd@example.com" required>
                
                <button type="submit" name="submit" value="submit">Tambah Data</button>
            </form>
        </div>
    </section>
</body>
</html>