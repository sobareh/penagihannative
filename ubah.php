<?php
    require 'functions.php';

    // ambil data di URL
    $id = $_GET["id"];

    //query data mahasiswa  berdasarkan id
    $kmpt = query("SELECT * FROM komputer WHERE id = $id")[0];

     if( isset($_POST["submit"]) ) {
            //cek apakah data berhasil diubah atau tidak
            if( ubah($_POST) > 0 ) {
                echo "
                        <script>
                        alert('data berhasil diubah!');
                        document.location.href = 'index.php';
                        </script>
                    ";
            } else {
                echo "
                        <script>
                        alert('data gagal diubah!');
                        document.location.href = 'index.php';
                        </script>
                    ";
            }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Data Komputer</title>
</head>
<body>
    <h1>Ubah Data Komputer</h1>
    <form action="" method="post">
        <ul>
            <input type="hidden" name="id" value="<?= $kmpt["id"]; ?>">
            <li>
                <label for="sn">Serial Number : </label>
                <input type="text" name="sn" id="sn" required value="<?= $kmpt["sn"]; ?>">
            </li>
            <li>
                <label for="merek">Merek Komputer : </label>
                <input type="text" name="merek" id="merek" required value="<?= $kmpt["merek"]; ?>">
            </li>
            <li>
                <label for="model">Model Komputer : </label>
                <input type="text" name="model" id="model" required value="<?= $kmpt["model"]; ?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required value="<?= $kmpt["email"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" required value="<?= $kmpt["gambar"]; ?>">
            </li>
            <li><button type="submit" name="submit" onclick="return confirm('Yakin Ubah Data?');">Ubah Data</button></li>
        </ul>
    </form>
</body>
</html>