<?php
    include 'functions.php';
    session_start();

   
    if( isset($_POST["login"]) ){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        //check username
        if( mysqli_num_rows($result) === 1 ) {

            //check password kalo ada
            $row = mysqli_fetch_assoc($result);
            if( $password === $row["password"] ) {

                //cek session
                $_SESSION["login"] = true ;

                header("location:index.php");
                // exit;
            }
        }

        $error = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login</h1> 

    <form action="" method="post">

        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password : </label>
                <input type="text" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>

    </form>
</body>
</html>