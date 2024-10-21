<?php
    session_start();

    include "koneksi.php";

    $level              = $_SESSION['level'];
    $npm                = $_GET['npm'];
    $_SESSION['npm']    = $npm;

    if($level == ''){
        header("location:index.php");
    }
    elseif($level == '1'){
        $sql = "SELECT * FROM identitas WHERE npm = '$npm'";
    }
    elseif($level == '2'){
        $sql = "SELECT * FROM identitas WHERE npm = '$npm'";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleForm.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
    <title>Database Mahasiswa | Edit</title>
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
        <?php
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $nama = $row['nama'];
                    $alamat = $row['alamat'];
                    $jk = $row['jk'];
                    $tgl = $row['tgl_lhr'];
                    $email = $row['email'];
                }
            }
            else{
                echo "Data tidak ditemukan";
            }
        ?>

        <div class="container">
            <h3>Edit Data Mahasiswa</h3>
            <form action="update.php" method="POST">
                <p>NPM</p>
                <input type="text" name="npm" placeholder="Masukkan NPM Anda" value="<?php echo $npm; ?>" readonly>
                <p>Nama</p>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap Anda" value="<?php echo $nama; ?>" required>
                <p>Alamat</p>
                <textarea name="alamat" rows="3" cols="70" placeholder="Masukkan alamat lengkap Anda" required><?php echo $alamat; ?></textarea>
                <p>Tanggal Lahir</p>
                <input type="date" name="tgl_lhr" value="<?php echo $tgl; ?>" required>
                <p>Jenis Kelamin</p>
                <label for="jk">
                    <input type="radio" name="jk" value="L" <?php if($jk == 'L') echo 'checked'; ?> required> Laki-laki
                    <input type="radio" name="jk" value="P" <?php if($jk == 'P') echo 'checked'; ?> required> Perempuan
                </label>
                <p>Email</p>
                <input type="email" name="email" placeholder="contoh: abcd@example.com" value="<?php echo $email; ?>" required>
                
                <button type="submit" name="update" value="update">Update Data</button>
            </form>
        </div>
        
    </section>
</body>