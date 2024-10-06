<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
    <link rel="stylesheet" href="styleForm.css">

</head>
<body>
    <?php
        session_start();
        include "koneksi.php";
        $id=$_GET['id'];
        $dataubah=mysqli_query($inikoneksi,"select * from identitas where npm='$id'");

        while($d=mysqli_fetch_array($dataubah))
        {
    ?>
    <header>
        <h1>Ubah Data Mahasiswa</h1>
    </header>
    <section>
        <div class="container">
            <form method="POST" action="ubahaksi.php">
                <p>NPM</p>
                <input type="text" name="npm" value="<?php echo $d['npm']; ?>" readonly>
                <p>Nama</p>
                <input type="text" name="nama" value="<?php echo $d['nama']; ?>" required>
                <p>Alamat</p>
                <textarea name="alamat" rows="3" cols="70" required><?php echo $d['alamat']; ?></textarea>
                <p>Tanggal Lahir</p>
                <input type="date" name="tgl_lhr" value="<?php echo $d['tgl_lhr']; ?>" required>
                <p>Jenis Kelamin</p>
                <label for="jk">
                    <input type="radio" name="jk" value="L" <?php if($d['jk'] == 'L') echo 'checked'; ?> required> Laki-laki
                    <input type="radio" name="jk" value="P" <?php if($d['jk'] == 'P') echo 'checked'; ?> required> Perempuan
                </label>
                <p>Email</p>
                <input type="email" name="email" value="<?php echo $d['email']; ?>" required>
                
                <button type="submit" name="submit" value="submit">Ubah Data</button>
            </form>
        </div>
    </section>
    <?php
        }   
    ?>
</body>
</html>