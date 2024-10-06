<?php
    include "koneksi.php";

    $id=$_GET['id'];

    mysqli_query($inikoneksi,"delete from identitas where npm='$id'");

    header("location:index.php");
?>