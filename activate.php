<?php
// <!-- The user is redirected to this file after clicking the activation link  -->
// <!-- Signup link contains two GET parameters: email and activation key  -->
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Account Activation</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Arvo Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- CSS -->
    <style>
    h1{
        color: purple;
    }
    .contactForm{
        border: 1px solid #7c73f6;
        margin-top: 50px;
        border-radius: 15px;
    }
    </style>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 contactForm">
                <h1>Account Activation</h1>
<?php 
// <!-- if email or activation key is missing show an error -->
if(!isset($_GET['email']) || !isset($_GET['key'])){
    echo '<div class="alert alert-danger">There was an error. Please click on the activation link you received by email.</div>';
    exit;
}
// <!-- else -->
//     <!-- Store them in two variables -->
$email = '';
$key = '';
$email = $_GET['email'];
$key = $_GET['key'];
//     <!-- Prepare variable for the query -->
$email = mysqli_real_escape_string($link, $email);
$key = mysqli_real_escape_string($link, $key);
//     <!-- Run query: set activation field to "activated" for the provided email  -->
$sql = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1";
$result = mysqli_query($link, $sql);
//     <!-- If query is successful, show success message and invite user to login  -->
if(mysqli_affected_rows($link) == 1){
    echo '<div class="alert alert-success">Your account has been activated.</div>';
    echo '<a href="index.php" type="button" class="btn btn-lg btn-success">Login</a>';
}else{
    //     <!-- else -->
    //         <!-- Show error message -->
    echo '<div class="alert alert-danger">Your account could not be activate. Please try again later.</div>';
    exit;
}
?>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>