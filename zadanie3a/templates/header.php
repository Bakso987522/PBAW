<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/app/security/check.php';
?>
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
