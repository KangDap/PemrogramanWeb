<?php
    $host="localhost";
    $user="root";
    $password="duhlupalagi";
    $namadb="mhs";

    $inikoneksi=mysqli_connect($host,$user,$password,$namadb);

    if(mysqli_connect_errno())
    {
        echo "koneksi gagal ke database";
    }
?>