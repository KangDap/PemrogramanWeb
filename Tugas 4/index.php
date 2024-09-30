<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Biodata</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <?php
        $nameErr = $npmErr = $addressErr = $ttlErr =  $genderErr = $hobbyErr = "";
        $name = $npm = $address = $ttl = $gender = $hobby = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Nama harus diisi";
            } else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                    $nameErr = "Hanya huruf dan spasi yang diperbolehkan";
                }
            }
            
            if (empty($_POST["npm"])) {
                $npmErr = "NPM harus diisi";
            } else {
                $npm = test_input($_POST["npm"]);
                if (!is_numeric($npm)) {
                    $npmErr = "Hanya angka yang diperbolehkan";
                }
            }

            if (empty($_POST["address"])) {
                $addressErr = "Alamat harus diisi";
            } else {
                $address = test_input($_POST["address"]);
            }

            if (empty($_POST["ttl"])) {
                $ttlErr = "Tempat, Tanggal Lahir harus diisi";
            } else {
                $ttl = test_input($_POST["ttl"]);
            }

            if (empty($_POST["gender"])) {
                $genderErr = "Jenis kelamin harus dipilih";
            } else {
                $gender = test_input($_POST["gender"]);
            }

            if (empty($_POST["hobby"])) {
                $hobbyErr = "Hobi harus dipilih";
            } else {
                $hobby = test_input(implode(", ", $_POST["hobby"]));
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <h1>Form Biodata Mahasiswa</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Nama: <input type="text" name="name">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        NPM: <input type="text" name="npm">
        <span class="error">* <?php echo $npmErr;?></span>
        <br><br>
        Alamat: <textarea name="address" rows="5" cols="40"></textarea>
        <span class="error">* <?php echo $addressErr;?></span>
        <br><br>
        Tempat, Tanggal Lahir: <input type="text" name="ttl">
        <span class="error">* <?php echo $ttlErr;?></span>
        <br><br>
        Jenis Kelamin:
        <input type="radio" name="gender" value="Laki-laki">Laki-laki
        <input type="radio" name="gender" value="Perempuan">Perempuan
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>
        Hobi:
        <input type="checkbox" name="hobby[]" value="Membaca">Membaca
        <input type="checkbox" name="hobby[]" value="Olahraga">Olahraga
        <input type="checkbox" name="hobby[]" value="Musik">Musik
        <span class="error">* <?php echo $hobbyErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">  
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !$nameErr && !$npmErr && !$addressErr && !$ttlErr && !$genderErr && !$hobbyErr) {
        echo "<h2>Data yang anda isi:</h2>";
        echo "Nama: " . $name;
        echo "<br>";
        echo "NPM: " . $npm;
        echo "<br>";
        echo "Alamat: " . $address;
        echo "<br>";
        echo "Tempat, Tanggal Lahir: " . $ttl;
        echo "<br>";
        echo "Jenis Kelamin: " . $gender;
        echo "<br>";
        echo "Hobi: " . $hobby;
    }
    ?>
</body>
</html>
