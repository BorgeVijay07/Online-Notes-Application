//Ajax Call for the sign up form
//Once the form is submitted
$("#signupform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
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
    //prevent default php processing
    //collect user inputs
    //send them to login.php using Ajax
        //Ajax call successful
            //if php files returns "success": redirect the user to notes page
            //otherwise show error message
        //Ajax call fails: show Ajax call error
    
//Ajax call for the forgot password form
//Once the form is submitted 
    //prevent default php processing
    //collect user inputs
    //send them to login.php using Ajax
        //AJAX call successful: show error or success message
        //AJAX call fails: show Ajax call error