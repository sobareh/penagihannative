<?php 
    session_start();
    
    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

    require 'functions.php'; ?>
<script src="js/sweetalert2.all.min.js"></script>
<?php    
    $id = $_GET["id"];
    //query data mahasiswa  berdasarkan id
    $npwp ="'" . $_GET["npwp"] . "'"; //var_dump($npwp);
    $berkas = query("SELECT * FROM berkasrbk where npwp = $npwp");
    $data = query("SELECT * FROM datarbk WHERE id = $id");

    if( isset($_POST["submit"]) ) {
      //cek apakah data berhasil ditambahkan atau tidak
      if( tambah($_POST) > 0 ) {
          echo '<script type="text/javascript">';
          echo 'setTimeout(function () { swal("Success","Data Berhasil diupload","success");';
          echo '}, 500);</script>';
          echo '<meta http-equiv="Refresh" content="3; URL=">';
      } else {
          echo '<script type="text/javascript">';
          echo 'setTimeout(function () { swal("Error","Data tidak berhasil diupload","warning");';
          echo '}, 500);</script>';
          echo '<meta http-equiv="Refresh" content="3; URL=">';
      }
}   
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
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
    <div class="row mt-0">
      <?php foreach($data as $row) : ?>
      <div class="col-md-6">
        <table class="table table-bordered table-sm table-striped">
          <tr>
            <td width="20%">NPWP</td>
            <td><?= $row['npwp']; ?></td>
          </tr>
          <tr>
            <td>Nama</td>
            <td><?= $row['nama']; ?></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><?= $row['alamat']; ?></td>
          </tr>
          <tr>
            <td>Kelurahan</td>
            <td><?= $row['kelurahan']; ?></td>
          </tr>
        </table>
        <div class="text-center mb-2 mt-1">
          <button class="btn btn-danger btn-md center-block" data-toggle="modal" data-target="#uploaddata"><i
              class="fa fa-cloud-upload-alt"></i> Upload Data Scan</button>
        </div>
      </div>
      <div class="col-md-6">
        <table class="table table-bordered table-sm table-striped">
          <tr>
            <td width="30%">Nomor Berkas</td>
            <td class="text-center"><b><?= $row['norbk']; ?></b></td>
          </tr>
          <tr>
            <td>Nomor Ruang</td>
            <td class="text-center"><b><?= $row['noruang']; ?></b></td>
          </tr>
          <tr>
            <td>Nomor Box</td>
            <td class="text-center"><b><?= $row['nobox']; ?></b></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td><b><?= $row['keterangan']; ?></b></td>
          </tr>
        </table>
        <blockquote class="blockquote">
          <footer class="blockquote-footer">Last update data: <cite
              title="Source Title"><?= $row['tanggaldata'];?></cite></footer>
        </blockquote>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="card">
      <div class="card-body">
        <h3>File Scan yang telah di Upload</h3>
        <hr>
        <div class="row">
        </div>
        <div class="col-sm-12 table-responsive-sm">
          <table class="table table-sm table table-bordered table-hover table-striped table-saya">
            <thead class="thead-dark text-center">
              <tr>
                <th>No</th>
                <th>Nama File</th>
                <th>Tanggal Upload</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
          <?php
            $no = 1;
            foreach($berkas as $row1):
          ?>
              <tr>
                <td class="text-center" width="5%"><?= $no++; ?></td>
                <td><?= $row1['namadata']; ?></td>
                <td class="text-center"><?= $row1['lastdate']; ?></td>
                <td class="text-center">
                  <a class="btn btn-sm btn-info" title="Download File"
                    href="http://10.1.14.232/penagihannative1/img/<?php echo $row1['dokumen'] ;?>" target="blank"><i
                      class="fas fa-download"></i></a>
                </td>
              </tr>
          <?php 
            endforeach;
          ?>
            </tbody>
            <script type="text/javascript">
              $(document).ready(function () {
                $(".table-saya").DataTable();
              })
            </script>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL UNTUK MENAMPILKAN FORM UPLOAD FILE SCAN -->
  <div class="modal fade" id="uploaddata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Data Scan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
            <?php foreach($data as $row) : ?>
            <div class="form-row">
              <div class="form-group col-md-5">
                <label for="npwp">NPWP</label>
                <input type="text" class="form-control" id="npwp" name="npwp" value="<?= $row['npwp'];?>" readonly>
              </div>
              <div class="form-group col-md-7">
                <label for="nama">Nama WP</label>
                <input type="text" class="form-control" id="nama" name="namawp" value="<?= $row['nama'];?>" readonly>
              </div>
            </div>
            <?php endforeach; ?>
            <div class="form-group">
              <label for="Nama File">Nama File</label>
              <input type="text" class="form-control" name="namaData" id="namadata" required>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Pilih File</label>
              <input type="file" class="form-control-file" name="dokumen" id="dokumen" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="js/bootstrap.js"></script>
  <script src="js/sweetalert2.all.min.js"></script>
</body>

</html>