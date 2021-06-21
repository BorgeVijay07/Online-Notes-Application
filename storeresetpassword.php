<!-- // This file receives the user_id and key generated to reset password, password1 and password2 -->
<!-- // This file then resets password for user_id if all checks are correct  -->
<?php
session_start();
include('connection.php');

// If user_id or key is missing 
//     Print error message 
if(!isset($_POST['user_id']) || !isset($_POST['key'])){
    echo '<div class="alert alert-danger">There was an error. Please click on the link you received by email.</div>';
    exit;
}

// else 
//     Store them in two variables
$user_id = '';
$key = '';
$errors= '';
$user_id = $_POST['user_id'];
$key = $_POST['key'];

//     define a time variable: now minus 24 hours 
$time = time()-86400;

//     Prepare variables for query 
$user_id = mysqli_real_escape_string($link, $user_id);
$key = mysqli_real_escape_string($link, $key);

//     Run query: Check combination of user_id and key exists and less than 24h old 
$sql = "SELECT user_id FROM forgotpassword WHERE rkey='$key' AND user_id='$user_id' AND time > '$time' AND status='pending'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}

//     If combination does not exists 
//         Print error message 
$count = mysqli_num_rows($result);
if($count != 1){
    echo "<div class='alert alert-danger'>Please try again.</div>";
    exit;
}

//     <!-- Define error messages -->
$missingPassword = '<p><strong>Please enter a password!</strong></p>';
$invalidPassword = '<p><strong>Your password should be at least 6 characters long and include one capital letter and one number!</strong></p>';
$differentPassword = '<p><strong>Password don\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your password!</strong></p>';

//Get passwords
if(empty($_POST["password"])){
    $errors .= $missingPassword;
}elseif(!(strlen($_POST["password"])>6 and preg_match('/[A-Z]/',$_POST["password"]) and preg_match('/[0-9]/',$_POST["password"]))){
    $errors .= $invalidPassword;
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }else{
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}

//     <!-- If there are any errors print error -->
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
    exit;
}

// <!-- No errors -->
//     <!-- prepare variable for queries -->
$password = mysqli_real_escape_string($link, $password);
// $password = md5($password);
$password = hash('sha256',$password);
$user_id = mysqli_real_escape_string($link, $user_id);

//Run Query: Update users password in the users table
$sql = "UPDATE users SET password='$password' WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was a problem storing a new password in the database!</div>';
    // echo '<div class="alert alert-danger">'.mysqli_error($link).'</div>';
    exit;
}

//set the key status to "used" in forgotpassword table to prevent the key from being used twice
$sql = "UPDATE forgotpassword SET status='used' WHERE rkey='$key' AND user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running query!</div>';
}else{
    echo '<div class="alert alert-success">Your password has been updated successfully.<a href="index.php">Login</a></div>';
}

?>