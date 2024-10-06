<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
    <link rel="stylesheet" href="styleForm.css">
</head>
<body>
    <header>
        <h1>Tambah Data Mahasiswa</h1>
    </header>
    <section>
        <div class="container">
            <form method="POST" action="tambahaksi.php">
                <p>NPM</p>
                <input type="text" name="npm" required>
                <p>Nama</p>
                <input type="text" name="nama" required>
                <p>Alamat</p>
                <textarea name="alamat" rows="3" cols="70" required></textarea>
                <p>Tanggal Lahir</p>
                <input type="date" name="tgl_lhr" required>
                <p>Jenis Kelamin</p>
                <label for="jk">
                    <input type="radio" name="jk" value="L" required> Laki-laki
                    <input type="radio" name="jk" value="P" required> Perempuan
                </label>
                <p>Email</p>
                <input type="email" name="email" required>
                
                <button type="submit" name="submit" value="submit">Tambah Data</button>
            </form>
        </div>
    </section>
</body>
</html>