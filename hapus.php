<?php 
	session_start();
		
	if( !isset($_SESSION["login"]) ) {
		header("Location: login.php");
		exit;
	}

	require 'functions.php'; ?>
	<script src="js/sweetalert2.all.min.js"></script>
	<link rel="stylesheet" href="http://localhost/penagihannative/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/penagihannative/css/bootstrap.min.css">
<?php
	$id = $_GET["id"];
	//$data = query("SELECT * FROM datarbk WHERE id = $id")[0];
	if( hapus($id) > 0 ) {
		echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Success","Data Berhasil dihapus","success");';
                echo '}, 500);</script>';
                echo '<meta http-equiv="Refresh" content="3; URL=datatable.php">';
	} else {
		echo '<script type="text/javascript">';
		echo 'setTimeout(function () { swal("Gagal","Data tidak berhasil dihapus","warning");';
		echo '}, 500);</script>';
		echo '<meta http-equiv="Refresh" content="3; URL=datatable.php">';
	}
?>