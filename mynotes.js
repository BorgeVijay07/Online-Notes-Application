$(function(){
    //define variables
    var activeNote = 0;

    //load notes om page: Ajax call to loadnotes.php
    $.ajax({
        url: "loadnotes.php",
        success: function(data){
            $('#notes').html(data);
        },
        error: function(){
            $('#alertContent').text("There was an error with the Ajax call. Please try again later.");
            $('#alert').fadeIn();
        }
    });

    //Add a new note: Ajax call to another file createnote.php
    $('#addNote').click(function(){
        $.ajax({
            url: "createnote.php",
            success: function(data){
                if(data == 'error'){
                    $('#alertContent').text("There was an issue inserting the new note in database!");
                    $('#alert').fadeIn();
                }else{
                    //update activeNote to the id of the new note
                    activeNote = data;
                    $('#notePad').val("");

                    //show hide elements
                    showHide(["#notePad", "#allnotes"], ["#notes", "#addNote", "#edit", "#done"]);

                    $('#notePad').focus();
                }
            },
            error: function(){
                $('#alertContent').text("There was an error with the Ajax call. Please try again later.");
                $('#alert').fadeIn();   
            }
        });
    });

    //type note: Ajax call to updatenote.php
    
    // click on all notes button
    $("#allnotes").click(function(){
        $.ajax({
            url: "loadnotes.php",
            success: function(data){
                $('#notes').html(data);
                showHide(["#addNote", "#edit", "#notes" ],["#allnotes", "#notePad"]);
            },
            error: function(){
                $('#alertContent').text("There was an error with the Ajax call. Please try again later.");
                $('#alert').fadeIn();
            }
        });
    });

    //click on done after editing: load notes again
    //click on edit: go to edit mode (show delete button, ...)

    //functions
        //click on a note
        //click on delete
        //show hide function
        function showHide(array1, array2){
            for(i=0; i<array1.length; i++)
            {
                $(array1[i]).show();
            }

            for(i=0; i<array2.length; i++)
            {
                $(array2[i]).hide();
            }
        };

});