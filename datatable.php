<!DOCTYPE html>
<html>

<head>
    <title>SMART</title>

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
    
    session_start();
    include 'functions.php';
        
     if( !isset($_SESSION["login"]) ) {
         header("Location: login.php");
         exit;
     }
	?>

    <nav class="navbar fixed-top navbar navbar-expand-lg navbar-dark bg-dark mb-4">
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

    <div class="container-fluid mt-5">

        <div class="card mt-3">
            <div class="card-body">

                <h3>Data RBK</h3>
                <p class="text-muted">Semua Data Ruang Berkas Penagihan</p>

                <hr>
                <div class="col-sm-12 table-responsive-sm">
                <table class="table table-bordered table-hover table-striped table-saya">
                    <thead class="thead-dark text-center">
                        <tr >
                            <th>No</th>
                            <th>NPWP</th>
                            <th>Nama Wajib Pajak</th>
                            <th>No. RBK</th>
                            <th>No. Ruang</th>
                            <th>No. Box</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
					$no = 1;
					$data = query("SELECT * FROM datarbk");
					foreach($data as $row){
					?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row["npwp"]; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["norbk"]; ?></td>
                            <td><?= $row["noruang"]; ?></td>
                            <td><?= $row["nobox"]; ?></td>
                            <td>
                                <a class="btn btn-sm btn-info" href="detail.php?id=<?= $row["id"];?>"><i class="fas fa-file-alt"></i></a> 
                                <a class="btn btn-sm btn-warning" href="ubahdata.php?id=<?= $row["id"];?>"><i class="fas fa-edit"></i></a> 
                                <a class="btn btn-sm btn-danger" href="hapus.php?id=<?= $row["id"]; ?>"
                                    onclick="return confirm('Yakin Hapus Data?');"><i class="fas fa-trash-alt"></i></a>
                            </td>
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

    </div>

</body>

</html>