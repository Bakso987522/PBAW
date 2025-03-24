<?php include _ROOT_PATH.'/templates/top.php';
include _ROOT_PATH.'/templates/header.php';
?>
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
                            <input class="form-control" id="id_x" type="text" name="loan" value="<?php print(isset($loan)?$loan:''); ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_op" class="col-sm-2 control-label">Okres kredytowania: </label>
                        <div class="col-sm-10">
                            <select id ="id_op" name="years" class="form-control col-sm-2">
                                <?php
                                for($i = 1; $i <= 30; $i++){
                                    if ($i == 1) {
                                        $y = ' ROK';
                                    } else if ($i == 2 || $i == 3 || $i == 4 || $i == 22 || $i == 23 || $i == 24) {
                                        $y = ' LATA';
                                    } else {
                                        $y = ' LAT';
                                    }

                                    echo '<option value="'.$i.'"'.(isset($years) ? $years == $i ? ' selected' : '' : '').'>'.$i.$y.'</option>';
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="id_y">Oprocentowanie: </label>
                        <div class="col-sm-10">
                            <input class="form-control" id="id_y" type="text" name="rate" value="<?php print(isset($rate)?$rate:''); ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2 text-right">
                            <button type="submit" class="btn btn-action">Oblicz</button>
                        </div>
                    </div>
                </form>
                <?php
                //wyświeltenie listy błędów, jeśli istnieją
                if (isset($messages)) {
                    if (count ( $messages ) > 0) {
                        echo '<ol class="alert alert-danger p-3 rounded list-unstyled top-margin">';
                        foreach ( $messages as $key => $msg ) {
                            echo '<li>'.$msg.'</li>';
                        }
                        echo '</ol>';
                    }
                }
                ?>
                <?php if (isset($result)){ ?>
                    <div class="alert alert-success p-3 rounded">
                        <?php echo 'Twoja miesięczna rata wynosi: '.$result; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php include _ROOT_PATH.'/templates/bottom.php';?>