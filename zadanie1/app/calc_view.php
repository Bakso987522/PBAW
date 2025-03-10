<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_x">Kwota pożyczki: </label>
	<input id="id_x" type="text" name="loan" value="<?php print(isset($loan)?$loan:''); ?>" /><br />
	<label for="id_op">Okres kredytowania: </label>
	<select name="years">
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
	</select><br />
	<label for="id_y">Oprocentowanie: </label>
	<input id="id_y" type="text" name="rate" value="<?php print(isset($rate)?$rate:''); ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Twoja miesięczna rata wynosi: '.$result; ?>
</div>
<?php } ?>

</body>
</html>