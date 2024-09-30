<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap">
    <title>Form Biodata</title>
    <style>
        * {
            margin: 0;
            font-family: Poppins;
        }

        body {
            background-color: #f0f0f0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        .container {
            display: flex; 
            justify-content: center; 
            align-items: center; 
            flex-direction: column;
        } 

        form{
            display: flex;
            flex-direction: column;
            margin-top: 25px;
            background-color: rgba(255, 255, 255, 0.5);;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .error {
            color: #FF0000;
            font-size: 14px;
        }

        input, select, textarea{
            padding: 5px;
            border: 1px solid #333;
            border-radius: 5px;
            transition: 0.3s;
            resize: none;
        }

        input[type="submit"]{
            padding: 10px;
            border: none;
            background-color: #333;
            color: white;
            cursor: pointer;
        }

        .output{
            display: flex;
            flex-direction: column;
            margin-top: 25px;
            background-color: rgba(255, 255, 255, 0.5);;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table, td {
            border: 1px solid #ddd;
            padding: 8px;
            border-collapse: collapse;
        }

        td:first-child {
            width: 150px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
        $nameErr = $npmErr = $addressErr = $tempatLahirErr = $tanggalLahirErr =  $genderErr = $hobbyErr = "";
        $name = $npm = $address = $tempatLahir = $tanggalLahir = $ttl = $gender = $hobby = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Nama harus diisi";
            } 
            else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                    $nameErr = "Hanya huruf dan spasi yang diperbolehkan";
                }
            }
            
            if (empty($_POST["npm"])) {
                $npmErr = "NPM harus diisi";
            } 
            else {
                $npm = test_input($_POST["npm"]);
                if (!is_numeric($npm)) {
                    $npmErr = "Hanya angka yang diperbolehkan";
                }
            }

            if (empty($_POST["address"])) {
                $addressErr = "Alamat harus diisi";
            } 
            else {
                $address = test_input($_POST["address"]);
            }

            if (empty($_POST["tempatlahir"])) {
                $tempatLahirErr = "Tempat Lahir harus diisi";
            } 
            else {
                $tempatLahir = test_input($_POST["tempatlahir"]);
            }

            if (empty($_POST["tanggallahir"])) {
                $tanggalLahirErr = "Tanggal Lahir harus diisi";
            } 
            else {
                $tanggalLahir = test_input($_POST["tanggallahir"]);
            }

            if (empty($_POST["gender"])) {
                $genderErr = "Jenis kelamin harus dipilih";
            } 
            else {
                $gender = test_input($_POST["gender"]);
            }

            if (empty($_POST["hobby"])) {
                $hobbyErr = "Hobi harus dipilih";
            } 
            else {
                $hobby = test_input($_POST["hobby"]);
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <header>
        <h1>Form Biodata Mahasiswa</h1>
    </header>
    
    <section>
        <div class="container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                <p>Nama Lengkap<span class="error">*</span></p>
                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Masukkan nama lengkap Anda">
                <span class="error"> <?php echo $nameErr;?></span>
                <br>
                <p>NPM <span class="error">*</span></p> 
                <input type="text" name="npm" value="<?php echo $npm; ?>" placeholder="Masukkan NPM Anda">
                <span class="error"> <?php echo $npmErr;?></span>
                <br>
                <p>Alamat <span class="error">*</span></p> 
                <textarea name="address" rows="3" cols="70" style="resize: none;" placeholder="Masukkan alamat Lengkap Anda"><?php echo $address; ?></textarea>
                <span class="error"> <?php echo $addressErr;?></span>
                <br>
                <p>Tempat Lahir <span class="error">*</span></p> 
                <input type="text" name="tempatlahir" value="<?php echo $tempatLahir; ?>" placeholder="Masukkan tempat lahir Anda">
                <span class="error"> <?php echo $tempatLahirErr;?></span>
                <br>
                <p>Tanggal Lahir <span class="error">*</span></p>
                <input type="date" name="tanggallahir" value="<?php echo $tanggalLahir; ?>">
                <span class="error"> <?php echo $tanggalLahirErr;?></span>
                <br>
                <p>Jenis Kelamin <span class="error">*</span></p>
                <div style="display: flex; gap: 10px;">
                    <label>
                        <input type="radio" name="gender" value="Laki-laki" <?php if(isset($gender) && $gender == "Laki-laki") echo "checked" ?>>Laki-laki
                    </label>
                    <label>
                        <input type="radio" name="gender" value="Perempuan" <?php if(isset($gender) && $gender == "Perempuan") echo "checked" ?>>Perempuan
                    </label>
                </div>  
                <span class="error"> <?php echo $genderErr;?></span>
                <br>
                <p>Hobi <span class="error">*</span></p>
                <input type="text" name="hobby" value="<?php echo $hobby; ?>" placeholder="Masukkan hobi Anda">
                <span class="error"> <?php echo $hobbyErr;?></span>
                <br>
                <input type="submit" name="submit" value="Submit">  
            </form>
        </div>
    </section>
        <br><br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !$nameErr && !$npmErr && !$addressErr && !$tempatLahirErr && !$tanggalLahirErr && !$genderErr && !$hobbyErr) {
        $ttl = $tempatLahir . ", " . $tanggalLahir;
        echo "<h2 style=\"text-align: center;\">BIODATA MAHASISWA</h2>";
        echo "<div class='container'>";
        echo "<div class='output'>";
        echo "<table>";
        echo "<tr><td><b>Nama Lengkap</b></td><td>" . strtoupper($name) . "</td></tr>";
        echo "<tr><td><b>NPM</b></td><td>" . $npm . "</td></tr>";
        echo "<tr><td><b>Alamat</b></td><td>" . strtoupper($address) . "</td></tr>";
        echo "<tr><td><b>TTL</b></td><td>" . $ttl . "</td></tr>";
        echo "<tr><td><b>Jenis Kelamin</b></td><td>" . $gender . "</td></tr>";
        echo "<tr><td><b>Hobi</b></td><td>" . $hobby . "</td></tr>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
    }
    ?>
</body>
</html>
