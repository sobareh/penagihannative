<?php 
    require 'functions.php';
    $id = $_GET["id"];

    //query data mahasiswa  berdasarkan id
    $data = query("SELECT * FROM komputer WHERE id = $id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Barang</title>
    <link rel="stylesheet" href="http://localhost/mvc/public/css/bootstrap.css">
</head>
<body>
    <h1>Detail Barang</h1>
  <div class="container mx-auto table table-sm col-sm-4" width="20">  
    <table class="table table-bordered">
    <?php foreach( $data as $row ) :?>
  <!-- <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
    </tr>
  </thead> -->
  <tbody >
    <tr>
      <th>Nomor Seri</th>
      <td> <?= $row["sn"]; ?> </td>
    </tr>
    <tr>
      <th>Merek</th>
      <td> <?= $row["merek"]; ?> </td>
    </tr>
    <tr>
      <th>Model</th>
      <td> <?= $row["model"]; ?> </td>
    </tr>
    <tr>
      <th>Email</th>
      <td> <?= $row["email"]; ?> </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
    <h1>Daftar Dokumen Barang</h1>
    <table>
    <tr></tr>
    </table>



    <script src="http://localhost/mvc/public/js/bootstrap.js"></script>
</body>
</html>