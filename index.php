<?php 
    session_start();

    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

    require 'functions.php';
    $data = query("SELECT * FROM komputer");

    //tombol cari ditekan
    if( isset($_POST["cari"]) ) {
        $data = cari($_POST["keyword"]);
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Penagihan</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Data Komputer</h1>

    <a href="tambah.php">Tambah Data Komputer</a> 
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian..." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Serial Number</th>
            <th>Merek Komputer</th>
            <th>Model Komputer</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1 ; ?>
        <?php foreach( $data as $row ) :?>
        <tr>
            <td><?= $i; ?></td>
            <td><img src="img/<?= $row["gambar"]; ?>" width="50"></td>
            <td><?= $row["sn"]; ?></td>
            <td><?= $row["merek"]; ?></td>
            <td><?= $row["model"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td>
                <a href="detail.php?id=<?= $row["id"];?>" >Detail</a> |
                <a href="ubah.php?id=<?= $row["id"];?>" >Ubah</a> |   
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin Hapus Data?');">Hapus</a>
            </td>
        </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>
