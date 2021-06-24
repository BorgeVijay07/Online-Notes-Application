<?php
//Start session and connect to database
session_start();
include('connection.php');

//define error messages
$missingCurrentPassword = '<p><strong>Please enter your current password!</strong></p>';
$incorrectCurrentPassword = '<p><strong>Your have entered wrong password!</strong></p>';
$missingPassword = '<p><strong>Please enter a new password!</strong></p>';
$invalidPassword = '<p><strong>Your new password should be at least 6 characters long and include one capital letter and one number!</strong></p>';
$differentPassword = '<p><strong>Password don\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your password!</strong></p>';
$errors = '';

//Check for errors
if(empty($_POST["currentpassword"])){
    $errors .= $missingCurrentPassword;
}else{
    $currentpassword = filter_var($_POST["currentpassword"], FILTER_SANITIZE_STRING);
    $currentpassword = mysqli_real_escape_string($link, $currentpassword);
    $currentpassword = hash('sha256',$currentpassword);

    //Check if given password is correct
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT password FROM users WHERE user_id='$user_id'";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);
    if($count != 1){
        echo "<div class='alert alert-danger'>There was a problem running the query!</div>";
    }else{
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($currentpassword != $row['password']){
            $errors .= $incorrectCurrentPassword;
        }
    }
}

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

//if there is an error print error messages
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else{
    $password = mysqli_real_escape_string($link, $password);
    $password = hash('sha256',$password);

    //else run the query and update password
    $sql = "UPDATE users SET password='$password' WHERE user_id='$user_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>The password could not be reset. Please try again later.</div>";
    }else{
        echo "<div class='alert alert-success'>Your password has been updated successfully.</div>";
    }
}

?>