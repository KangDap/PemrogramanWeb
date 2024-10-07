<?php
    $host="localhost";
    $user="root";
    $password="";
    $namadb="mhs";

    $inikoneksi=mysqli_connect($host,$user,$password,$namadb);

    if(mysqli_connect_errno())
    {
        echo "koneksi gagal ke database";
    }
?>
