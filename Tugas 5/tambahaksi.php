<?php
    include "koneksi.php";

    if(isset($_POST['submit'])){
        $nama       =$_POST['nama'];
        $npm        =$_POST['npm'];
        $alamat     =$_POST['alamat'];
        $tgl_lhr    =$_POST['tgl_lhr'];
        $jk         =$_POST['jk'];
        $email      =$_POST['email'];

        mysqli_query($inikoneksi,"insert into identitas (nama,npm,alamat,tgl_lhr,jk,email)
        VALUES('$nama','$npm','$alamat','$tgl_lhr','$jk','$email')");
    }

    header("location:index.php");
?>