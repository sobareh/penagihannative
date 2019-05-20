<?php
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    echo '<script language="javascript">alert("Anda berhasil Logout!"); document.location="index.php";</script>';
        //header("Location: login.php");
        exit;
?>