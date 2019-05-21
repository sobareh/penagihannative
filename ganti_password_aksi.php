<?php
    require 'functions.php'; ?>
    <script src="js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
<?php
    $password = $_POST['password'];
 
    mysqli_query($conn,"UPDATE user SET password='$password'");

    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Success","Password berhasil diubah","success");';
    echo '}, 300);</script>';
    echo '<meta http-equiv="Refresh" content="3; URL=index.php">';