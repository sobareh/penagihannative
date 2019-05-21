<?php 
	session_start();
		
	if( !isset($_SESSION["login"]) ) {
		header("Location: login.php");
		exit;
	}
		header('Content-type: application/json; charset=UTF-8');
	
		$response = array();
		
		if ($_POST['hapus']) {
			
			require_once 'ajax_configsweetalert.php';
			
			$pid = intval($_POST['hapus']);
			$query = "DELETE FROM datarbk WHERE id=:pid";
			$stmt = $DBcon->prepare( $query );
			$stmt->execute(array(':pid'=>$pid));
			
			if ($stmt) {
				$response['status']  = 'success';
				$response['message'] = 'Product Deleted Successfully ...';
			} else {
				$response['status']  = 'error';
				$response['message'] = 'Unable to delete product ...';
			}
			echo json_encode($response);
		}
?>