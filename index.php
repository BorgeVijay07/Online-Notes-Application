<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online Notes</title>

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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Contact us</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Login</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Jumbotron with sign-up button -->
    <div class="jumbotron">
      <h1>Online Notes App</h1>
      <p>Your notes with you wherever you go.</p>
      <p>Easy to use, protects all your notes!</p>
      <button type="button" class="btn btn-lg green signup">Sign up-It's free</button>
    </div>

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