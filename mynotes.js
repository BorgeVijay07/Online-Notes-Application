$(function(){
    //define variables
    var activeNote = 0;
    var editMode = false;

    //load notes om page: Ajax call to loadnotes.php
    $.ajax({
        url: "loadnotes.php",
        success: function(data){
            $('#notes').html(data);
            clickonNote();
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
                    $('textarea').val("");

                    //show hide elements
                    showHide(["#notePad", "#allnotes"], ["#notes", "#addNote", "#edit", "#done"]);

                    $('textarea').focus();
                }
            },
            error: function(){
                $('#alertContent').text("There was an error with the Ajax call. Please try again later.");
                $('#alert').fadeIn();   
            }
        });
    });

    //type note: Ajax call to updatenote.php
    $("textarea").keyup(function(){
        //ajax call to update the task of id activeNote
        $.ajax({
            url: "updatenote.php",
            type: "POST",
            //we need to send the current note content with its id to the php file
            data: {note: $(this).val(), id:activeNote},
            success: function(data){
                if(data == 'error'){
                    $('#alertContent').text("There was an issue updating note in the database!.");
                    $('#alert').fadeIn();
                }
            },
            error: function(){
                $('#alertContent').text("There was an error with the Ajax call. Please try again later.");
                $('#alert').fadeIn();
            }
        });
    });

    // click on all notes button
    $("#allnotes").click(function(){
        $.ajax({
            url: "loadnotes.php",
            success: function(data){
                $('#notes').html(data);
                showHide(["#addNote", "#edit", "#notes" ],["#allnotes", "#notePad"]);
                clickonNote();
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
        function clickonNote(){
            $('.noteheader').click(function(){
                if(!editMode){
                    //Update activeNote variable to id of note
                    activeNote = $(this).attr("id");
    
                    //fill textarea
                    $('textarea').val($(this).find('.text').text());
    
                    //show hide elements
                    showHide(["#notePad", "#allnotes"], ["#notes", "#addNote", "#edit", "#done"]);
    
                    $('textarea').focus();
                }
            });
    
        }

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