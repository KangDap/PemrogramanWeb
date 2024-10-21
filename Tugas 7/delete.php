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

    $sql1 = "DELETE FROM identitas WHERE npm = '$npm'";
    $sql2 = "DELETE FROM users WHERE npm = '$npm'";

    if(($conn->query($sql1) === TRUE) && ($conn->query($sql2) === TRUE)){
        header("Location: tampil_data.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>