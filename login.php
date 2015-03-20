<?php
session_start();
if(isset($_SESSION['username'])){
    header("Location: /ocpanel/index.php");
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OC - Operationeel Centrum</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/small-business.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand" href="#">
                    
                </span>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/index.php">Home</a>
                    </li>
                    <li>
                        <a href="/login.php">Log in</a>
                    </li>
                    <li>
                        <a href="/request.php">Vraag een account aan</a>
                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
<form action="/inc/scripts/userhandeling.php?login" method="post">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">@</span>
  <input type="text" name="username" class="form-control" placeholder="Gebruikersnaam" aria-describedby="basic-addon1">
</div> 
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">#</span>
  <input type="text" name="password" class="form-control" placeholder="Wachtwoord" aria-describedby="basic-addon1">
</div> <br>
    <center><input type="submit" value="Log In!" class="btn btn-default"></center>
    
    </form>
  