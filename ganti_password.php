<?php
     session_start();
        
     if( !isset($_SESSION["login"]) ) {
         header("Location: login.php");
         exit;
	 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMART | Ganti Password</title>
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
    <link rel="stylesheet" href="/penagihannative/css/bootstrap.css">
    <link rel="stylesheet" href="/penagihannative/css/bootstrap.min.css">
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

<div class="container mt-3">

	<div class="row">
		<div class="col-md-6 mx-auto">
			
			<div class="card">
				<div class="card-body">

					<?php 
					if(isset($_GET['pesan'])){
						if($_GET['pesan']=="password"){
							//echo "<div class='alert alert-success'>Password telah diganti.</div>";
						}
					}
					?>

					<h3>Ganti Password</h3>
					<p class="text-muted">Ganti Password User</p>

					<hr>

					<form action="ganti_password_aksi.php" method="post">

						<div class="form-group">
							<label>Masukkan Password Baru</label>
							<input type="password" name="password" required="required" class="form-control">
						</div>

						<input type="submit" name="submit" id="submit" value="Simpan" class="btn btn-primary btn-sm" onclick="Swal('Ubah Password','Berhasil','success')">

					</form>


				</div>
			</div>

		</div>
	</div>

</div>
</body>
</html>
