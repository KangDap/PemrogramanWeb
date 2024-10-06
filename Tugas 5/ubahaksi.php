<?php
    include "koneksi.php";

    if(isset($_POST['submit'])){
        $nama       =$_POST['nama'];
        $npm        =$_POST['npm'];
        $alamat     =$_POST['alamat'];
        $tgl_lhr    =$_POST['tgl_lhr'];
        $jk         =$_POST['jk'];
        $email      =$_POST['email'];

        mysqli_query($inikoneksi, "update identitas set nama='$nama', alamat='$alamat', 
        tgl_lhr='$tgl_lhr', jk='$jk', email='$email' where npm='$npm'");
    }

    header("location:index.php");
?>