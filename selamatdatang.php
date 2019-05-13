<?php
     session_start();
        
     if( !isset($_SESSION["login"]) ) {
         header("Location: login.php");
         exit;
     }

    require 'functions.php';
    $username = 910222897 ;
    $data = mysqli_query($conn,"SELECT * FROM user where username = $username");
    $datauser = mysqli_fetch_assoc($data);
    // var_dump($data);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMART | Home</title>
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
    <link rel="stylesheet" href="http://localhost/penagihannative/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/penagihannative/css/bootstrap.min.css">
    <style></style>
</head>
<body class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <a class="navbar-brand" href="#"><img src="/smart/32.png" alt="" sizes="" srcset=""> SMART</a>
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
                        <a class="nav-link" href="png.php"><i class="fa fa-users"></i> Data RBK Penagihan</a>
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

<div class="container jumbotron mt-5">
  <h1 class="display-4">Selamat Datang di Aplikasi SMART</h1>
  <p class="lead">Hallo <b><?php echo $datauser['username']?> </b>, Selamat Datang Kembali di halaman aplikasi SMART </p>
  <hr class="my-4">
  <p>Aplikasi yang dimaksudkan untuk mempermudah Pelaksana Seksi Penagihan dalam mencari dan mengupdate Data yang ada di Ruang Berkas Penagihan.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>

    <script src="http://localhost/penaghannative/js/jqueryslim.min.js" ></script>
    <script src="http://localhost/penaghannative/js/popper.min.js" ></script>
    <script src="http://localhost/penaghannative/js/bootstrap.min.js"></script>

</body>
</html>