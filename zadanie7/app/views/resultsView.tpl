{extends file='main.tpl'}
{block name='content'}
    <header id="head" class="secondary"></header>

    <!-- container -->
    <div class="container min-vh-100" style="min-height: 70vh">
<h1 class="ma">Wyniki kalkulatora</h1>
        <div class="row">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Historia wyników kalkulatora</h2>

                                {if $results|@count > 0}

                                    <table class="table-hover table table-striped table-bordered">
                                        <tr>
                                            <th>Użytkownik</th>
                                            <th>Kwota</th>
                                            <th>Oprocentowanie</th>
                                            <th>Lata</th>
                                            <th>Miesięczna rata</th>
                                            <th>Data obliczenia</th>
                                        </tr>
                                        {foreach $results as $r}
                                            <tr>
                                                <td>{$r.login}</td>
                                                <td>{$r.amount}</td>
                                                <td>{$r.rate}%</td>
                                                <td>{$r.years}</td>
                                                <td>{$r.result}</td>
                                                <td>{$r.date}</td>
                                            </tr>
                                        {/foreach}
                                    </table>
                                {else}
                                    <p>Brak zapisanych wyników.</p>
                                    {foreach $messages as $msg}
                                        <p>{$msg}</p>
                                    {/foreach}
                                {/if}

                            </div>
                        </div>
                    </div>
                </div>

        </div>


    </div>	<!-- /container -->

{/block}