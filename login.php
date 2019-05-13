<?php
    session_start();
    if( isset($_SESSION["login"]) ) {
        header("Location: index.php");
        exit;
    }

    include 'functions.php';
   
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
                exit;
            }
        }

       
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMART - Login</title>
    <link rel="stylesheet" href="http://localhost/penagihannative/css/bootstrap.css">
    <style>
 .body 
 {
    background-color: ;
 }
 .form-signin
 {
     max-width: 330px;
     padding: 15px;
     margin: 0 auto;
 }
 .form-signin .form-signin-heading, .form-signin .checkbox
 {
     margin-bottom: 10px;
 }
 .form-signin .checkbox
 {
     font-weight: normal;
 }
 .form-signin .form-control
 {
     position: relative;
     font-size: 16px;
     height: auto;
     padding: 10px;
     -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
     box-sizing: border-box;
 }
 .form-signin .form-control:focus
 {
     z-index: 2;
 }
 .form-signin input[type="text"]
 {
     margin-bottom: -1px;
     border-bottom-left-radius: 0;
     border-bottom-right-radius: 0;
 }
 .form-signin input[type="password"]
 {
     margin-bottom: 10px;
     border-top-left-radius: 0;
     border-top-right-radius: 0;
 }
 .account-wall
 {
     margin-top: 20px;
     padding: 40px 0px 20px 0px;
     background-color: #f7f7f7;
     -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
     -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
     box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
 }
 .login-title
 {
     color: #555;
     font-size: 40px;
     font-weight: 400;
     display: block;
 } 
 .profile-img
 {
     width: 96px;
     height: 96px;
     margin: 0 auto 10px;
     display: block;
     -moz-border-radius: 50%;
     -webkit-border-radius: 50%;
     border-radius: 50%;
 }
 .need-help
 {
     margin-top: 10px;
 }
 .new-account
 {
     display: block;
     margin-top: 10px;
 }
 </style>
</head>
<body class="body">
<?php
    

?>
<div class="container text-center">
<div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 mt-5 mx-auto">
        <br><br>
    <!-- <h1 class="text-center login-title">Login</h1> -->
        <div class="account-wall">
        <h1 class="text-center mx-auto login-title"><img src="http://localhost/penagihannative/img/stumbleupon.png " class="ui image" width="80">&nbsp;Login</h1>
            <!-- <img class="profile-img" src="http://localhost/penagihannative/img/stumbleupon.png"
                alt=""> -->
            <form class="form-signin" action="login.php" method="post">
            <input type="text" class="form-control" placeholder="username" name="username" id="username" autocomplete="off" required>
            <input type="password" class="form-control" placeholder="password" name="password" id="password" required>
            <br>
            <button class="btn btn-lg btn-dark btn-block" type="submit" name="login" id="login">
                Login</button>
                <br><br>
            </form>
            <!-- <p>&copy; KPP Pratama Medan Barat 2019</p> -->
        </div>
        
    </div>
</div>
</div>
</body>
</html>


