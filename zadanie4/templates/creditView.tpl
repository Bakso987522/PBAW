{extends file='splashPage.tpl'}

{block name='form'}


    <div class="container top-margin bottom-margin">

        <h2 class="text-center top-space">Oblicz ratę kredytu</h2>
        <br>
        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-body top-margin">

                    <form id="calc" class="form-horizontal" action="app/controller.php?action=calcCompute#calc" method="post">
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
{/block}