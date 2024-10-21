<?php
    session_start();
    include "koneksi.php";

    $npm    = $_SESSION["npm"];
    $level  = $_SESSION["level"];

    if($level == ''){
        header("location:index.php");
    }

    if(isset($_POST['update'])){
        $npm    = $_POST['npm'];
        $nama   = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jk     = $_POST['jk'];
        $tgl    = date('Y-m-d',strtotime($_POST['tgl_lhr']));
        $email  = $_POST['email'];

        $sql = "UPDATE identitas SET nama = '$nama', alamat = '$alamat', jk = '$jk', tgl_lhr = '$tgl', email = '$email' WHERE npm = '$npm'";

        if($conn->query($sql) === TRUE){
            header("Location: tampil_data.php");
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>