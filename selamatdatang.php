<?php
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
    <link rel="stylesheet" href="http://localhost/penagihannative/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/penagihannative/css/bootstrap.min.css">
    <style></style>
</head>
<body class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="">SMART</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="">Home</a>
                    <a class="nav-item nav-link" href="">Data RBK</a>
                    <a class="nav-item nav-link" href="">About</a>
                </div>
            </div>
        </div>
    </nav>

<div class="container jumbotron mt-5">
  <h1 class="display-4">Hallo <?php echo $datauser['username'] ?>, Selamat Datang di Aplikasi SMART</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
</div>

    <script src="http://localhost/penaghannative/js/jqueryslim.min.js" ></script>
    <script src="http://localhost/penaghannative/js/popper.min.js" ></script>
    <script src="http://localhost/penaghannative/js/bootstrap.min.js"></script>

</body>
</html>