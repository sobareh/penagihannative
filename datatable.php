<?php
    
    session_start();
    include 'functions.php';
        
     if( !isset($_SESSION["login"]) ) {
         header("Location: login.php");
         exit;
     }
	?>
<!DOCTYPE html>
<html>

<head>
    <title>SMART | Datatable</title>

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

    <div class="container-fluid mt-3">

        <div class="card">
            <div class="card-body">

                <h3>Data RBK <small class="text-muted">Semua Data Ruang Berkas Penagihan</small> </h3>
                <hr>
                <div class="row">
                    <div class="col-sm-12 mx-auto text-center">
                    <a href="tambahdata.php" class="btn btn-success btn-sm mb-2 mx-auto" tabindex="-1" role="button"
                        aria-disabled="true"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
                </div>
                <div class="col-sm-12 table-responsive-sm">
                    <table class="table table-sm table table-bordered table-hover table-striped table-saya">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th>No</th>
                                <th>NPWP</th>
                                <th>Nama Wajib Pajak</th>
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
                        $id = $row["id"];
				?>
                            <tr>
                                <td class="text-center" width="5%"><?= $no++; ?></td>
                                <td class="text-center" width="10%"><?= $row["npwp"]; ?></td>
                                <td><?= $row["nama"]; ?></td>
                                <td><?= $row["noruang"]; ?></td>
                                <td><?= $row["nobox"]; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-info" title="Detail Data"
                                        href="detail.php?id=<?= $row["id"];?>"><i class="fas fa-file-alt"></i></a>
                                    <a class="btn btn-sm btn-warning tombol-uba" title="Ubah Data"
                                        href="ubahdata.php?id=<?= $row["id"];?>"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger notif" id="delete_product" title="Hapus Data"
                                       data-id="<?= $id; ?>" href="javascript:void(0)">
                                                <i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php 
					}
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
    <script src="js/sweetalert2.all.min.js"></script>
    <script>
            $(document).ready(function(){
            
            $(document).on('click', '#delete_product', function(e){
                
                var Id = $(this).data('id');
                SwalDelete(Id);
                e.preventDefault();
            });
            
        });
        function SwalDelete(Id){
		
		swal({
			title: 'Are you sure?',
			text: "It will be deleted permanently!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true,
			  
			preConfirm: function() {
			  return new Promise(function(resolve) {
			       
			     $.ajax({
			   		url: 'hapus.php',
			    	type: 'POST',
			       	data: 'hapus='+Id,
			       	dataType: 'json'
			     })
			     .done(function(response){
                     swal('Deleted!', response.message, response.status);
                     readProducts();
                 })
			     .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
                 });
			  });
		    },
			allowOutsideClick: false			  
		});	
    }
   function readProducts(){
    setTimeout(function(){window.location.reload(true);},3000);
	}
    </script>
</body>

</html>