<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Mahasiswa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        session_start();
        include "koneksi.php";
        $ambildata=mysqli_query($inikoneksi,"select * from identitas");
    ?>
    <header>
        <h1>Database Mahasiswa</h1>
    </header>

    <section>
        <div class="container">
            <table>
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
    
                <?php
                    $i = 1;
                    while($datatampil=mysqli_fetch_array($ambildata))
                    {
                        echo"<tr>";
                            echo"<td>".$i."</td>";
                            echo"<td>".$datatampil['npm']."</td>";
                            echo"<td>".$datatampil['nama']."</td>";
                            echo"<td>".$datatampil['alamat']."</td>";
                            echo"<td>".$datatampil['tgl_lhr']."</td>";
                            echo"<td>".$datatampil['jk']."</td>";
                            echo"<td>".$datatampil['email']."</td>";
                            echo"<td>
                                    <a class='edit' href='ubah.php?id=$datatampil[npm]'>Edit</a>
                                    <a class='delete' href='deleteaksi.php?id=$datatampil[npm]'>Delete</a>
                                </td>";
                        echo"</tr>";
                        $i++;
                    }
                ?>
            </table>
            <a class='add' href="tambah.php">Tambah Data Mahasiswa</a>
        </div>
    </section>
</body>
</html>i