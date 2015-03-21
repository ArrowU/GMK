<?php
if(isset($_GET['logout'])){
    session_start();
    session_destroy();   
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

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-8">
                <img src="/img/Police_Cruiser_by_WhoDrewThis.png" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">

                <h1>Meldkamersysteem</h1>
                <p>Operationeel Centrum</p>
                <a class="btn btn-primary btn-lg" href="/login.php">Log in als centralist</a>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
                <div class="well text-center">
                    Deze website is gemaakt voor & door de Benelux112 GTA RolePlay Clan.<br>
                    Het kopieëren of publiceren van content op deze website is niet toegestaan.
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">

            <!-- /.col-md-4 -->
            
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Vraag een account aan:</h2>
                <p>Ben je nieuw, en heb je nog geen account aangevraagd? Klik dan op de knop hieronder.</p>
                <a class="btn btn-default" href="/request.php">vraag een account aan</a>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Auteursrechtelijk beschermd door de Nederlandse wet. &copy; <strong>Benelux112</strong></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
