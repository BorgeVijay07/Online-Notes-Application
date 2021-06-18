<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profile</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="styling.css">

    <!-- Arvo Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Styling -->
    <style>
        #container{
            margin-top: 100px;
        }

        #done, #allnotes, #notePad{
            display: none;
        }

        .buttons{
            margin-bottom: 20px;
        }

        textarea{
            width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;
            border-left-width: 20px;
            border-color: #CA3DD9;
            color: #CA3DD9;
            background-color: #FBEFFF;
            padding: 10px;
        }

        tr{
            cursor: pointer;
        }
    </style>
  </head>
  <body>
    <!-- Navigation Bar -->
    <nav role='navigation' class='navbar navbar-custom navbar-fixed-top'>
      <div class='container-fluid'>
        <div class='navbar-header'>
          <a class='navbar-brand'>Online Notes</a>
          <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class='navbar-collapse collapse' id="navbarCollapse">
          <ul class="nav navbar-nav">
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Contact us</a></li>
            <li class="active"><a href="#">My Notes</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Logged in as <b>username</b></a></li>
            <li><a href="#">Log out</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Container -->
    <div class="container" id="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                <h2>General Account Setting:</h2>
                <div class="table-responsive">
                    <table class="table table-hover table-condensed table-bordered">
                        <tr data-target="#updateusername" data-toggle="modal">
                            <td>Username</td>
                            <td>value</td>
                        </tr>
                        <tr data-target="#updateemail" data-toggle="modal">
                            <td>Email</td>
                            <td>value</td>
                        </tr>
                        <tr data-target="#updatepassword" data-toggle="modal">
                            <td>Password</td>
                            <td>hidden</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Update username -->
    <form method="post" id="updateusernameform">
      <div class="modal" id='updateusername' role="dialog" aria-labelledby="myModalLable" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">&times;</button>
              <h4>Edit Username:</h4>
            </div>
            <div class="modal-body">

            <!-- Login message from PHP file -->
              <div id="loginMessage"></div>

              <div class="form-group">
                <label for="username">Username:</label>
                <input class="form-control" type="text" name="username" id="username" maxlength="30" value="username value">
              </div>
            </div>
            <div class="modal-footer">
              <input class="btn green" name="updateusername" type="submit" value="Submit">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <!-- Update email -->
    <form method="post" id="updateemailform">
      <div class="modal" id='updateemail' role="dialog" aria-labelledby="myModalLable" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">&times;</button>
              <h4>Enter new Email:</h4>
            </div>
            <div class="modal-body">

            <!-- Login message from PHP file -->
              <div id="loginMessage"></div>

              <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" id="email" maxlength="50" value="email value">
              </div>
            </div>
            <div class="modal-footer">
              <input class="btn green" name="updateemail" type="submit" value="Submit">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <!-- Update password -->
    <form method="post" id="updatepasswordform">
      <div class="modal" id='updatepassword' role="dialog" aria-labelledby="myModalLable" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">&times;</button>
              <h4>Enter Current and New password:</h4>
            </div>
            <div class="modal-body">

            <!-- Login message from PHP file -->
              <div id="loginMessage"></div>

              <div class="form-group">
                <label for="currentpassword" class="sr-only">Your Current Password:</label>
                <input class="form-control" type="password" name="currentpassword" id="currentpassword" maxlength="30" placeholder="Your Current Password">
              </div>
              <div class="form-group">
                <label for="password" class="sr-only">Choose a password:</label>
                <input class="form-control" type="password" name="password" id="password" maxlength="30" placeholder="Choose a password">
              </div>
              <div class="form-group">
                <label for="password2" class="sr-only">Confirm password:</label>
                <input class="form-control" type="password" name="password2" id="password2" maxlength="30" placeholder="Confirm password">
              </div>
            </div>
            <div class="modal-footer">
              <input class="btn green" name="updatepassword" type="submit" value="Submit">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <!-- Footer -->
    <div class="footer">
      <div class="container">
        <p>BorgeVijay07 Online Notes App Cpoyright &copy; 2021-<?php $today = date("Y"); echo$today ?>.</i></p>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>