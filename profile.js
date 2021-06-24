//Ajax call to updateusername.php
$("#updateusernameform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    // console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updateusername.php",
        type: "POST",
        data: datatopost,
        //AJAX call successful: show error or success message
        success: function(data){
            if(data){
                $("#updateusernameMessage").html(data);
            }else{
                location.reload();
            }
        },
        //AJAX call fails: show Ajax call error
        error: function(){
            $("#updateusernameMessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});

//Ajax call to updatepassword.php
$("#updatepasswordform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    // console.log(datatopost);
    //send them to updatepassword.php using AJAX
    $.ajax({
        url: "updatepassword.php",
        type: "POST",
        data: datatopost,
        //AJAX call successful: show error or success message
        success: function(data){
            if(data){
                $("#updatepasswordMessage").html(data);
            }
        },
        //AJAX call fails: show Ajax call error
        error: function(){
            $("#updatepasswordMessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});

//Ajax call to updateemail.php
$("#updateemailform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    // console.log(datatopost);
    //send them to updatepassword.php using AJAX
    $.ajax({
        url: "updateemail.php",
        type: "POST",
        data: datatopost,
        //AJAX call successful: show error or success message
        success: function(data){
            if(data){
                $("#updateemailMessage").html(data);
            }
        },
        //AJAX call fails: show Ajax call error
        error: function(){
            $("#updateemailMessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    });
});