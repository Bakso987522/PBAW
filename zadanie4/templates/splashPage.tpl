{extends file='main.tpl'}
{block name="content"}
<header id="head">
    <div class="container">
        <div class="row"></br></br>
            <h1 class="lead">NAJLEPSZY KALKULATOR KREDYTOWY</h1></br>
            {if !$isLogged}
                <h5>Dostępny tylko dla zalogowanych użytkowników</h5></br></br>
                <p><button class="btn btn-default btn-lg soft-scroll-link" role="button" href="#calc">Zobacz demo</button></p>
                <h5>Lub <a href="app/controller.php?action=loginPage" >zaloguj się</a>, aby skorzystać z aplikacji</h5>
            {else}
                <p><button class="btn btn-default btn-lg soft-scroll-link top-margin" role="button" href="#calc">Przejdź do aplikacji</button></p>
            {/if}
        </div>
    </div>
</header>
{block name='form'}{/block}
{/block}