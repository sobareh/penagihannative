<?php
    require 'functions.php';
     if( isset($_POST["submit"]) ) {
            //cek apakah data berhasil ditambahkan atau tidak
            if( tambah($_POST) > 0 ) {
                echo "
                        <script>
                        alert('data berhasil ditambahkan');
                        document.location.href = 'index.php';
                        </script>
                    ";
            } else {
                echo "
                        <script>
                        alert('data berhasil ditambahkan');
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
    <title>Tambah Data Komputer</title>
</head>
<body>
    <h1>Tambah Data Komputer</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="sn">Serial Number : </label>
                <input type="text" name="sn" id="sn" required>
            </li>
            <li>
                <label for="merek">Merek Komputer : </label>
                <input type="text" name="merek" id="merek" required>
            </li>
            <li>
                <label for="model">Model Komputer : </label>
                <input type="text" name="model" id="model" required>
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" required>
            </li>
            <li><button type="submit" name="submit">Tambah Data</button></li>
        </ul>
    </form>
</body>
</html>