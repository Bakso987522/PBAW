<?php
require_once dirname(__FILE__).'/config.php';
require_once _ROOT_PATH.'/app/security/check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
    <base href="/zadanie3a/">

    <title>Kalkulator kredytowy</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php">Kalkulator kredytowy</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="#">Strona Główna</a></li>
                    <li>
                    <?php
					$isLogged ? print '<a class="btn" href="app/security/logout.php">WYLOGUJ SIĘ</a>' : print '<a class="btn" href="app/security/login_view.php">LOGOWANIE</a>';
					?>
                    </li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
            <div class="row"></br></br>
                <h1 class="lead">NAJLEPSZY KALKULATOR KREDYTOWY</h1></br>
                <?php if(!$isLogged):?>
                    <h5>Dostępny tylko dla zalogowanych użytkowników</h5></br></br>
                    <p><button class="btn btn-default btn-lg soft-scroll-link" role="button" href="#calc">Zobacz demo</button></p>
                    <h5>Lub <a href="app/security/login_view.php" >zaloguj się</a>, aby skorzystać z aplikacji</h5>
                <?php else:?>
                    <p><button class="btn btn-default btn-lg soft-scroll-link top-margin " role="button" href="#calc">Przejdź do aplikacji</button></p>
                <?php endif;?>
			</div>
		</div>
	</header>
	<!-- /Header -->


	<!-- container -->
    <?php include _ROOT_PATH.'/app/calc_view.php';?>



	<footer id="footer" class="top-space">

        <div class="footer1">
            <div class="container">
                <div class="row">





                    <div class="col-md-6 widget">
                        <h3 class="widget-title">Aplikacja kredytowa</h3></br></br>
                        <div class="widget-body">
                            <p>Najlepsza aplikacja kredytowa do obliczania miesięcznej raty kredytu.</p>
                            <p>Dostęp dla kalkulatora tylko dla osób zalogowanych</p></br>
                        </div>
                    </div>

                </div> <!-- /row of widgets -->
            </div>
        </div>

        <div class="footer2">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="simplenav">
                                <a href="#">Strona główna</a> |
                                <b><a href="app/security/login_view.php">Logowanie</a></b>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="text-right">
                                Copyright &copy; 2014, JB. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a>
                            </p>
                        </div>
                    </div>

                </div> <!-- /row of widgets -->
            </div>
        </div>

	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>