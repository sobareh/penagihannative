<!DOCTYPE html>
<html>

<head>
    <title>Dashboard - SMART</title>

    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
    <!-- <script type="text/javascript" src="http://localhost/penagihannative/js/jquery.js"></script> -->
    <script type="text/javascript" src="http://localhost/penagihannative/js/bootstrap.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <!-- <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css">
    <script type="text/javascript" src="http://localhost/penagihannative/datatables/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="datatables/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/> -->

</head>

<body>
    <?php
	include 'functions.php';
	?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">

            <a class="navbar-brand" href="#"><img src="/smart/32.png" alt="" sizes="" srcset=""> SMART</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Dashboard <span
                                class="sr-only">(current)</span></a>
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

    <div class="container">

        <div class="card">
            <div class="card-body">

                <h3>Data Komputer</h3>
                <p class="text-muted">Semua Data Komputer</p>

                <hr>

                <table class="table table-bordered table-hover table-striped table-saya">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Serial Number</th>
                            <th>Merek</th>
                            <th>Model</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
					$no = 1;
					$warga = query("SELECT * FROM komputer");
					foreach($warga as $row){
					?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row["sn"]; ?></td>
                            <td><?= $row["merek"]; ?></td>
                            <td><?= $row["model"]; ?></td>
                            <td><?= $row["email"]; ?></td>
                        </tr>
                        <?php 
					}
					?>
                    </tbody>
                    <script type="text/javascript">
                      $(document).ready(function () {
                    $(".table-saya").DataTable(); }) </script>
                </table>

            </div>
        </div>

    </div>

</body>

</html>