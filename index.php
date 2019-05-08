<?php 
    session_start();
    
    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

    //require 'functions.php';
    //$data = query("SELECT * FROM komputer");

    //tombol cari ditekan
    if( isset($_POST["cari"]) ) {
        $data = cari($_POST["keyword"]);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman </title>
    <link rel="stylesheet" href="http://localhost/penagihannative/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/penagihannative/datatables/datatables.min.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="">SMART</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="">Home</a>
                    <a class="nav-item nav-link" href="">Data RBK</a>
                    <a class="nav-item nav-link" href="">About</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <a href="logout.php">Logout</a>
        <h1>Data Komputer</h1>

        <a href="tambah.php">Tambah Data Komputer</a>
        <br><br>

        <form action="" method="post">
            <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian..."
                autocomplete="off">
            <button type="submit" name="cari">Cari!</button>
        </form>
        <br>
        <table class="table table-bordered datatabel">
            <thead class="thead-dark">
                <tr align="center">
                    <th>No.</th>
                    <th>Serial Number</th>
                    <th>Merek Komputer</th>
                    <th>Model Komputer</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            require 'functions.php';
            $data = query("SELECT * FROM komputer");
            $i = 1 ;
            foreach( $data as $row ) {
            ?>
                <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row["sn"]; ?></td>
                        <td><?= $row["merek"]; ?></td>
                        <td><?= $row["model"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td>
                            <a href="detail.php?id=<?= $row["id"];?>">Detail</a> |
                            <a href="ubah.php?id=<?= $row["id"];?>">Ubah</a> |
                            <a href="hapus.php?id=<?= $row["id"]; ?>"
                                onclick="return confirm('Yakin Hapus Data?');">Hapus</a>
                            <a class="btn btn-sm btn-warning" href="file/<?= $row['gambar']; ?>">Download</a>
                        </td>
                    </tr>
                 
             <?php
              
                }
             ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript" src="C:\xampp\htdocs\penagihannative\jquery\src\jquery.js"></script>
    <script type="text/javascript" src="http://localhost/penagihannative/js/bootstrap.js"></script>
    <script type="text/javascript" src="http://localhost/penagihannative/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('datatabel').DataTable();
        });
    </script>
</body>

</html>