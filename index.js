//Ajax Call for the sign up form
//Once the form is submitted
$("#signupform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    // console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        //AJAX call successful: show error or success message
        success: function(data){
            if(data){
                $("#signupMessage").html(data);
            }
        },
        //AJAX call fails: show Ajax call error
        error: function(){
            $("#signupMessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});
    
//Ajax call for the login form
//Once the form is submitted
$("#loginform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    // console.log(datatopost);
    //send them to login.php using AJAX
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        //AJAX call successful: show error or success message
        success: function(data){
            if(data == "success"){
                window.location = "mainpageloggedin.php"
            }else{
                $("#loginMessage").html(data);
            }
        },
        //AJAX call fails: show Ajax call error
        error: function(){
            $("#loginMessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});
    
//Ajax call for the forgot password form
//Once the form is submitted 
$("#forgotpasswordform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    //send them to forgot-password.php using AJAX
    $.ajax({
        url: "forgot-password.php",
        type: "POST",
        data: datatopost,
        //AJAX call successful
        success: function(data){
            $("#forgotpasswordMessage").html(data);
        },
        //AJAX call fails: show Ajax call error
        error: function(){
            $("#forgotpasswordMessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});