<?php
$conn = mysqli_connect('localhost', 'root', '', 'komputer');

$query = mysqli_query($conn, "SELECT * FROM datarbk WHERE npwp='".mysqli_escape_string($conn, $_POST['npwp'])."'");
$data = mysqli_fetch_array($query);
 
echo json_encode($data);