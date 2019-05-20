<?php
    session_start();
    
    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }
    
    // //require 'functions.php';
    // $id = $_GET["id"];

    // hapus($id) ;
    // header('location:index.php');

    header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['hapus']) {
		
		require_once 'dbconfig.php';
		
		$pid = intval($_POST['hapus']);
		$query = "DELETE FROM datarbk WHERE id=:id";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':id'=>$pid));
		if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'Product Deleted Successfully ...';
		} else {
			$response['status']  = 'error';
			$response['message'] = 'Unable to delete product ...';
		}
		echo json_encode($response);
	}
