<?php
    session_start();
    include "koneksi.php";

    $npm    = $_SESSION["npm"];
    $level  = $_SESSION["level"];

    if($level == ''){
        header("location:index.php");
    }
    elseif($level == '1'){
        $sql = "SELECT * FROM identitas WHERE npm = '$npm'";
    }
    elseif($level == '2'){
        $sql = "SELECT * FROM identitas";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
    <title>Database Mahasiswa</title>
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
            <?php
                $result = $conn->query($sql);
            ?>
            <h1>Database Mahasiswa</h1>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>JK</th>
                        <th>Tanggal Lahir</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($result->num_rows > 0){
                            $no = 1;
                            while($row = $result->fetch_assoc()){
                                $tgl = date('d-m-Y',strtotime($row['tgl_lhr']));
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['npm']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['jk']; ?></td>
                        <td><?php echo $tgl; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a class="edit" href="edit.php?npm=<?php echo $row['npm']; ?>">Edit</a>
                            <?php
                                if($level == '2'){
                            ?>
                                <a class="delete" href="delete.php?npm=<?php echo $row['npm']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <?php 
                        } 
                    }
                    else{
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <?php
                if($level == '2'){
            ?>
            <a class="add" href="input_data.php">Tambah Data</a>
            <?php
                }
            ?>
        </div>
    </section>
</body>
</html>