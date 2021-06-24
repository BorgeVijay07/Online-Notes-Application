<?php
//Start session and connect to database
session_start();
include('connection.php');

//get user_id
$id = $_SESSION['user_id'];

//get username through Ajax
$username = $_POST['username'];

//Run query: to update username
$sql = "UPDATE users SET username='$username' WHERE user_id='$id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error storing the new username in the database</div>';
}
?>