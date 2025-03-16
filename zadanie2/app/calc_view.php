<?php require_once dirname(__FILE__) .'/../config.php';
require_once _ROOT_PATH.'/app/security/AuthController.php';
// Utworzenie obiektu kontrolera logiowania
$controller = new AuthController();
// Wywołanie metody logowania
$controller->isLogged();
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<head>
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <a href="<?php print(_APP_URL);?>/app/security/logout.php" class="absolute top-0 right-0 mt-4 mr-4 text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-lg">Wyloguj</a><br /><br />
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Kalkulator kredytowy</h2>
<form class="flex flex-col space-y-4" action="<?php print(_APP_URL);?>/app/calc.php" method="post">
    <label class="block text-gray-700" for="id_x">Kwota pożyczki: </label>
    <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="id_x" type="text" name="loan" value="<?php print(isset($loan)?$loan:''); ?>" />
    <label class="block text-gray-700" for="id_op">Okres kredytowania: </label>
    <select class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" name="years">
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
    <label class="block text-gray-700" for="id_y">Oprocentowanie: </label>
    <input class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" id="id_y" type="text" name="rate" value="<?php print(isset($rate)?$rate:''); ?>" />
    <button class="bg-blue-500 text-white px-4 py-2 rounded" type="submit">Oblicz</button>
</form>

        <?php
        //wyświeltenie listy błędów, jeśli istnieją
        if (isset($messages)) {
            if (count ( $messages ) > 0) {
                echo '<ol class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-5 ">';
                foreach ( $messages as $key => $msg ) {
                    echo '<li>'.$msg.'</li>';
                }
                echo '</ol>';
            }
        }
        ?>
        <?php if (isset($result)){ ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-5">
                <?php echo 'Twoja miesięczna rata wynosi: '.$result; ?>
            </div>
        <?php } ?>
    </div>
</div>




</body>
</html>