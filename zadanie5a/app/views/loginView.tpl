{extends file='main.tpl'}
{block name='content'}
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

                            <form method="post" action="controller.php?action=login">
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

{/block}