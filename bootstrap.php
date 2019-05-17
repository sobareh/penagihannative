<?php
     require 'functions.php';
     if( isset($_POST["submit"]) ) {
            //cek apakah data berhasil ditambahkan atau tidak
            if( tambahdata($_POST) > 0 ) {
                echo "
                        <script>
                        alert('data berhasil ditambahkan');
                        document.location.href = 'index.php';
                        </script>
                    ";
            } else {
                echo "
                        <script>
                        alert('data tidak berhasil ditambahkan');
                        document.location.href = 'index.php';
                        </script>
                    ";
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
        <!-- <div class="row">
            <div class="col-lg-6 bg-primary">
                Kolom Pertama
            </div>
            <div class="col-lg-6 bg-danger">
                Kolom Kedua
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 bg-success">Kolom Ketiga</div>
            <div class="col-lg-4 bg-info">Kolom Keempat</div>
            <div class="col-lg-4 bg-warning">Kolom Kelima</div>
        </div> -->
        <!-- <div class="card mt-3">
            <h5 class="card-header bg-dark text-light text-left">Header Card</h5>
            <div class="card-body text-justify">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit minima fugit ipsa mollitia quibusdam
                vero ipsum ut! Excepturi, reprehenderit in? Repellat, nesciunt. Accusantium distinctio non
                exercitationem eos minus ipsum magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </div>
        </div> -->
        <!-- <div class="row mt-3">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div> -->
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
                        <input type="text" class="form-control" id="nama" name="nama" disabled>
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
                        <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="" required></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="kelurahan">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="" required>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
                <script src="http://localhost/penagihannative/js/jqueryslim.min.js"></script>
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
    <script src="http://localhost/penagihannative/js/jqueryslim.min.js"></script>
    <script src="http://localhost/penagihannative/js/popper.min.js"></script>
    <script src="http://localhost/penagihannative/js/bootstrap.min.js"></script>
    <script src="http://localhost/penagihannative/js/jquery.js"></script>
    <script src="http://localhost/penagihannative/js/jquery.inputmask.bundle.js"></script>
    <script>
        $(document).ready(function () {
            $('#npwp').inputmask('999999999-999.999');
        });
    </script>
</body>

</html>
