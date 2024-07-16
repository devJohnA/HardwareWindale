<?php

require_once("../include/initialize.php");



 ?>

<?php

 // login confirmation

  if(isset($_SESSION['USERID'])){

    redirect(web_root."admin/index.php");

  }

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <style>.login-dark {
                height: 1000px;
                background-size: cover;
                position: relative;
              }
              
              .login-dark form {
                max-width: 320px;
                width: 90%;
                background-color: white;
                padding: 40px;
                border-radius: 4px;
                transform: translate(-50%, -50%);
                position: absolute;
                top: 50%;
                left: 50%;
                color: black;
                box-shadow: 3px 3px 4px rgba(0,0,0,0.2);
              }
              
              .login-dark .illustration {
                text-align: center;
                padding: 15px 0 20px;
                font-size: 100px;
                color: #2980ef;
              }
              
              .login-dark form .form-control {
                background: none;
                border: none;
                border-bottom: 1px solid #434a52;
                border-radius: 0;
                box-shadow: none;
                outline: none;
                color: inherit;
              }
              
              .login-dark form .btn-primary {
                background: #fd2323;
                border: none;
                border-radius: 4px;
                padding: 11px;
                box-shadow: none;
                margin-top: 26px;
                text-shadow: none;
                outline: none;
              }
              
              .login-dark form .btn-primary:hover, .login-dark form .btn-primary:active {
                background: seagreen;
                outline: none;
              }
              
              .login-dark form .forgot {
                display: block;
                text-align: center;
                font-size: 12px;
                color: #6f7a85;
                opacity: 0.9;
                text-decoration: none;
              }
              
              .login-dark form .forgot:hover, .login-dark form .forgot:active {
                opacity: 1;
                text-decoration: none;
              }
              
              .login-dark form .btn-primary:active {
                transform: translateY(1px);
              }
              </style>
</head>

<body style="background:#Eb212a;;">
            <div class="login-dark" style="height: 695px;">
            <form method="post" action="" role="login">
                    <h2 class="sr-only">Login Form</h2>
                    <div class="illustration"><img src="img/wk.png" width="120" height="150"></i></div>
                    <div class="form-group"><input class="form-control" type="email" name="user_email" placeholder="Email"></div>
                    <div class="form-group"><input class="form-control" type="password" name="user_pass" id="password" placeholder="Password"></div>
                    <div class="form-group"><button type="submit" name="btnLogin" class="btn btn-primary btn-block">Log In</button></div></form>
            </div>
           
    <?php 



if(isset($_POST['btnLogin'])){

  $email = trim($_POST['user_email']);

  $upass  = trim($_POST['user_pass']);

  $h_upass = sha1($upass);

  

   if ($email == '' OR $upass == '') {



      message("Invalid Username and Password!", "error");

      redirect("login.php");

         

    } else {  

  //it creates a new objects of member

    $user = new User();

    //make use of the static function, and we passed to parameters

    $res = $user::userAuthentication($email, $h_upass);

    if ($res==true) { 

       message("You login as ".$_SESSION['U_ROLE'].".","success");

      if ($_SESSION['U_ROLE']=='Administrator'){

         redirect(web_root."admin/index.php");

      }else{

           redirect(web_root."admin/login.php");

      }

    }else{

      message("Account does not exist! Please contact Administrator.", "error");

       redirect(web_root."admin/login.php"); 

    }

 }

 } 

 ?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>