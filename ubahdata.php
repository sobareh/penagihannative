<?php
    session_start();
    
    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }

    require 'functions.php'; ?>
    <script src="js/sweetalert2.all.min.js"></script>

    <?php 
    // ambil data di URL
    $id = $_GET["id"];

    //query data mahasiswa  berdasarkan id
    $data = query("SELECT * FROM datarbk WHERE id = $id")[0];
    // var_dump($data);
    // die;

     if( isset($_POST["submit"]) ) {
            //cek apakah data berhasil diubah atau tidak
            if( ubahData($_POST) > 0 )  {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Success","Data Berhasil diubah","success");';
                echo '}, 500);</script>';
                echo '<meta http-equiv="Refresh" content="3; URL=datatable.php">';
            } else{
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Error","Data tidak berhasil diubah","warning");';
                echo '}, 500);</script>';
                echo '<meta http-equiv="Refresh" content="3; URL=datatable.php">';
            }
        }
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
    <div class="container-fluid mt-2 text-center">
        <div class="card col-md-6 mt-3 text-justify mx-auto">
            <div class="card-body">
                <h3>Update Data</h3>
                <small>Ruang Berkas Penagihan</small>
                <hr>
                <form method="post">
                    <div class="form-row">
                        <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                        <div class="form-group col-md-4">
                            <label for="npwp">NPWP</label>
                            <input type="text" class="form-control" id="npwp" name="npwp" value="<?= $data["npwp"]; ?>" required>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nama">Nama WP</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data["nama"]; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="norbk">Nomor Berkas</label>
                            <input type="text" class="form-control" id="norbk" name="norbk" value="<?= $data["norbk"]; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="noruang">Nomor Ruang</label>
                            <input type="text" class="form-control" id="noruang" name="noruang" value="<?= $data["noruang"]; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nobox">Nomor Box</label>
                            <input type="text" class="form-control" id="nobox" name="nobox" value="<?= $data["nobox"]; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" required><?php echo $data["alamat"]; ?></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?php echo $data["kelurahan"]; ?>"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data["keterangan"]; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit" name="submit" >Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
    <script src="http://localhost/penagihannative/js/jqueryslim.min.js"></script>
    <script src="http://localhost/penagihannative/js/popper.min.js"></script>
    <script src="http://localhost/penagihannative/js/bootstrap.min.js"></script>
    <script src="http://localhost/penagihannative/js/jquery.js"></script>
    <script src="http://localhost/penagihannative/js/jquery.inputmask.bundle.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="sweetalertfunction.js"></script>
    <script>
        $(document).ready(function () {
            $('#npwp').inputmask('999999999-999.999');
        });
    </script>
</body>

</html>