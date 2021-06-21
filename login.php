<?php
// <!-- Start session -->
session_start();
// <!-- Connect to the database  -->
include('connection.php');

// <!-- Check user inputs -->
//     <!-- Define error message  -->
$missingEmail = '<p><strong>Please enter your email address!</strong></p>';
$missingPassword = '<p><strong>Please enter your password!</strong></p>';

//     <!-- Get email and password  -->
//     <!-- Store errors in errors variable -->
$email = '';
$errors = '';
$password = '';
$resultMessage = '';
$result = '';

//Get email
if(empty($_POST["loginemail"])){
    $errors .= $missingEmail;
}else{
    $email = filter_var($_POST["loginemail"], FILTER_SANITIZE_EMAIL);
}

//Get password
if(empty($_POST["loginpassword"])){
    $errors .= $missingPassword;
}else{
    $password = filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING);
}

//     <!-- If there are any errors  -->
//         <!-- print error message  -->
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else{
    //     <!-- else: No errors  -->
    //         <!-- Prepare variables for the query -->
    $email = mysqli_real_escape_string($link, $email);
    $password = mysqli_real_escape_string($link, $password);
    // $password = md5($password);
    $password = hash('sha256',$password);


    //         <!-- Run query: Check combination of email & password exists  -->
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND activation='activated'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error running the query!</div>';
        exit;
    }

    //         <!-- If email & password dont match print error -->
    $count = mysqli_num_rows($result);
    if($count !== 1){
        echo '<div class="alert alert-danger">Wrong Username or Password!</div>';
    }else{
        //         <!-- else  -->
        //             <!-- log th user in: Set session variables -->
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);   
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];

        //<!-- If rember me is not checked  -->
        if(empty($_POST['rememberme'])){
            //                 <!-- print "success" -->
            echo "success";
        }else{
            //             <!-- else  -->
            //                 <!-- Create two variables $authentificator1 and $authentificator2 -->
            $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10));
            $authentificator2 = openssl_random_pseudo_bytes(20);
            // <!-- store them in cookie  -->

            function f1($a, $b){
                $c = $a .",". bin2hex($b);
                return $c;
            }

            $cookieValue = f1($authentificator1, $authentificator2);
            setcookie("rememberme", $cookieValue, time() + 1296000);

            function f2($a){
                $b = hash('sha256', $a);
                return $b;
            }
            $f2authentificator2 = f2($authentificator2);
            $user_id = $_SESSION['user_id'];
            $expiration = date('Y-m-d H:i:s', time() + 1296000);
            
            //                 <!-- Run query to store them in remember me table  -->
            $sql = "INSERT INTO rememberme (`authentificator1`, `f2authentificator2`, `user_id`, `expires`) VALUES ('$authentificator1', '$f2authentificator2', '$user_id', '$expiration')";
            $result = mysqli_query($link, $sql);

            //                 <!-- If query unsuccessful  -->
            if(!$result){
                //                     <!-- print error -->
                echo '<div class="alert alert-danger">There was an error storin the data to remember you next time!</div>';
            }else{
                //                 <!-- else  -->
                //                     <!-- print "success" -->
                echo "success";
            }
        }
    }
}    
?>