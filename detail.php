<?php 
    session_start();
    
    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

    require 'functions.php';
    $id = $_GET["id"];
    $npwp = $_GET["npwp"];

    //query data mahasiswa  berdasarkan id
    $data = query("SELECT * FROM datarbk WHERE id = $id");
    $data1 = query("SELECT * FROM berkasdigital where npwp = $npwp");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SMART | Detail Data</title>
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="datatables/dataTables.bootstrap4.min.css" />

    <script src="datatables/jquery.min.js"></script>
    <script src="datatables/jquery.dataTables.min.js"></script>
    <script src="datatables/dataTables.bootstrap4.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
      <div class="container">
            <a class="navbar-brand" href="index.php"><img src="/smart/32.png" alt="" sizes="" srcset=""> SMART</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="datatable.php"><i class="fa fa-users"></i> Data RBK Penagihan</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-briefcase"></i> Master Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ganti_password.php"><i class="fa fa-lock"></i> Ganti Password</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          tes 123
        </div>
      </div>
    </div>
  </div>
</div>
  <script src="js/bootstrap.js"></script>
  <script src="js/sweetalert2.all.min.js"></script>
</body>

</html>