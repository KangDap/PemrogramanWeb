<?php
    session_start();

    if($_SESSION['level'] != '2'){
        include "logout.php";
    }

    include "koneksi.php";

    $level              = $_SESSION['level'];
    $npm                = $_GET['npm'];
    $_SESSION['npm']    = $npm;

    if($level == ''){
        header("location:index.php");
    }

    if(isset($_POST['submit'])){
        $npm   = $_POST['npm'];
        $nama  = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jk    = $_POST['jk'];
        $tgl   = date('Y-m-d',strtotime($_POST['tgl_lhr']));
        $email = $_POST['email'];

        if((!empty($npm)) && (!empty($nama))){
            $sql = "INSERT INTO identitas (npm, nama, alamat, jk, tgl_lhr, email) VALUES ('$npm', '$nama', '$alamat', '$jk', '$tgl', '$email')";

            if($conn->query($sql) === TRUE){
                header("Location: tampil_data.php");
            }
            else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        else{
            echo "NPM dan Nama tidak boleh kosong!";
        }
    }
?>