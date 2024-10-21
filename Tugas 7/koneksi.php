<?php
    $host       = "localhost";
    $user       = "root";
    $password   = "duhlupalagi";
    $dbname     = 'mahasiswa';

    $conn = mysqli_connect($host, $user, $password, $dbname);

    if(mysqli_connect_errno())
    {
        echo "Koneksi gagal ke database";
    }
?>