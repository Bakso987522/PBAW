<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport"    content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
    <base href="/zadanie3b/">

    <title>{$page_title|default:'Kalkulator kredytowy'}</title>

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
                    <a class="btn" href="{$isLogged ? 'app/security/logout.php' : 'app/security/login.php'}">{$isLogged ? 'WYLOGUJ SIĘ' : 'LOGOWANIE'}</a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<!-- /.navbar -->
{if $splash_page}
<header id="head">
    <div class="container">
        <div class="row"></br></br>
            <h1 class="lead">NAJLEPSZY KALKULATOR KREDYTOWY</h1></br>
            {if !$isLogged}
            <h5>Dostępny tylko dla zalogowanych użytkowników</h5></br></br>
            <p><button class="btn btn-default btn-lg soft-scroll-link" role="button" href="#calc">Zobacz demo</button></p>
            <h5>Lub <a href="app/security/login.php" >zaloguj się</a>, aby skorzystać z aplikacji</h5>
            {else}
            <p><button class="btn btn-default btn-lg soft-scroll-link top-margin" role="button" href="#calc">Przejdź do aplikacji</button></p>
            {/if}
        </div>
    </div>
</header>
{/if}


{if $calc_page}
<div class="container top-margin bottom-margin">

    <h2 class="text-center top-space">Oblicz ratę kredytu</h2>
    <br>
    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-2">
        <div class="panel panel-default">
            <div class="panel-body top-margin">

                <form id="calc" class="form-horizontal" action="app/calc.php#calc" method="post">
                    <div class="form-group">
                        <label for="id_x" class="col-sm-2 control-label">Kwota pożyczki: </label>
                        <div class="col-sm-10">
                            <input class="form-control" id="id_x" type="text" name="loan" value="{$loan}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_op" class="col-sm-2 control-label">Okres kredytowania: </label>
                        <div class="col-sm-10">
                            <select id ="id_op" name="years" class="form-control col-sm-2">
                                {foreach from=$years_drop item=year}
                                    <option value="{$year.value}" {if $year.value == $defYear}selected{/if}>
                                        {$year.label}
                                    </option>
                                {/foreach}

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="id_y">Oprocentowanie: </label>
                        <div class="col-sm-10">
                            <input class="form-control" id="id_y" type="text" name="rate" value="{$rate}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2 text-right">
                            <button type="submit" class="btn btn-action">Oblicz</button>
                        </div>
                    </div>
                </form>
                {if isset($messages)}
                    {if count($messages) > 0}
                        <ol class="alert alert-danger p-3 rounded list-unstyled top-margin">
                            {foreach from=$messages item=msg}
                                <li>{$msg}</li>
                            {/foreach}
                        </ol>
                    {/if}
                {/if}
                {if isset($result)}
                    <div class="alert alert-success p-3 rounded">
                        {$result}
                    </div>
                {/if}
            </div>
        </div>
    </div>
</div>
{/if}



{if $login_page}
<header id="head" class="secondary"></header>

<!-- container -->
<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.php">Strona główna</a></li>
        <li class="active">Logowanie</li>
    </ol>

    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title">Zaloguj się</h1></br>
            </header>

            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center">Zaloguj się do swojego konta</h3>
                        <p class="text-center text-muted">Zalogowani użtkownicy mogą korzystać z funkcjonalnośći aplikacji</p>
                        <hr>

                        <form method="post" action="app/security/login.php">
                            <div class="top-margin">
                                <label>Login <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="login">
                            </div>
                            <div class="top-margin">
                                <label>Hasło <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="pass">
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-lg-8">

                                </div>
                                <div class="col-lg-4 text-right">
                                    <button class="btn btn-action" type="submit">Zaloguj się</button>
                                </div>
                            </div>
                        </form>
                        {if isset($messages)}
                            {if count($messages) > 0}
                                <ol class="alert alert-danger p-3 rounded list-unstyled top-margin">
                                    {foreach from=$messages item=msg}
                                        <li>{$msg}</li>
                                    {/foreach}
                                </ol>
                            {/if}
                        {/if}
                    </div>
                </div>

            </div>

        </article>
        <!-- /Article -->

    </div>
</div>	<!-- /container -->
{/if}



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
                            <b><a href="app/security/login.php">Logowanie</a></b>
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