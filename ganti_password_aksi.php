<?php
require 'functions.php';

$password = $_POST['password'];

mysqli_query($conn,"UPDATE user SET password='$password'");

header("location:ganti_password.php?pesan=password");

?>