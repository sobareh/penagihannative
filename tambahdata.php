<?php
     require 'functions.php'; ?>
     <script src="js/sweetalert2.all.min.js"></script>
    <?php 
     if( isset($_POST["submit"]) ) {
            //cek apakah data berhasil ditambahkan atau tidak
            if( tambahdata($_POST) > 0 ) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Success","Data Berhasil ditambahkan","success");';
                echo '}, 500);</script>';
                echo '<meta http-equiv="Refresh" content="3; URL=datatable.php">';
            } else {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Error","Data tidak berhasil ditambahkan","warning");';
                echo '}, 500);</script>';
                echo '<meta http-equiv="Refresh" content="3; URL=tambahdata.php">';
            }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMART | Tambah Data</title>
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style></style>
</head>

<body class="">
    <div class="container-fluid mt-2 text-center">
        <div class="card col-md-6 mt-3 text-justify mx-auto">
            <div class="card-body">
                <h3>Input Data</h3>
                <small>Ruang Berkas Penagihan</small>
                <hr>
                <form method="post">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="npwp">NPWP</label>
                            <input type="text" class="form-control" id="npwp" name="npwp" required>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nama">Nama WP</label>
                            <input type="text" class="form-control" id="nama" name="nama" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="norbk">Nomor Berkas</label>
                            <input type="text" class="form-control" id="norbk" name="norbk" placeholder="" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="noruang">Nomor Ruang</label>
                            <input type="text" class="form-control" id="noruang" name="noruang" placeholder="" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nobox">Nomor Box</label>
                            <input type="text" class="form-control" id="nobox" name="nobox" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder=""
                                required></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder=""
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
                <script src="js/jqueryslim.min.js"></script>
                <script>
                    $(function () {
                        $("#npwp").change(function () {
                            var npwp = $("#npwp").val();

                            $.ajax({
                                url: 'ajax_isiotomatis.php',
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    'npwp': npwp
                                },
                                success: function (datarbk) {
                                    $("#nama").val(datarbk['nama']);
                                }
                            });
                        });

                    });
                </script>
            </div>
        </div>
    </div>
    <script src="js/jqueryslim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.inputmask.bundle.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#npwp').inputmask('999999999-999.999');
        });
    </script>
</body>

</html>
