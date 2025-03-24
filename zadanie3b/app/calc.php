<?php
// KONTROLER strony kalkulatora
use Smarty\Smarty;

require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'/app/security/check.php';
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';
$smarty = new Smarty();


// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$loan = $_REQUEST ['loan'] ?? null;
$years = $_REQUEST ['years'] ?? null;
$rate = $_REQUEST ['rate'] ?? null;

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if (  (isset($loan) && isset($years) && isset($rate))) {
    //sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
    $isLogged ? $smarty->assign('messages', []) : $smarty->assign('messages', ['<a href="app/security/login_view.php">Zaloguj się,</a> aby skorzystać z kalkulatora']);

// sprawdzenie, czy potrzebne wartości zostały przekazane
    if ($loan == "") {
        $smarty->append('messages', 'Nie podano kwoty pożyczki');
    }
    if ($years == "") {
        $smarty->append('messages', 'Nie podano okresu kredytowania');
    }
    if ($rate == "") {
        $smarty->append('messages', 'Nie podano oprocentowania');
    }

//nie ma sensu walidować dalej gdy brak parametrów
    if (empty($smarty->getTemplateVars('messages'))) {

        // sprawdzenie, czy $loan i $years są liczbami całkowitymi
        if (!is_numeric($loan)) {
            $smarty->append('messages', 'Kwota pożyczki nie jest liczbą');
        }

        if (!is_numeric($years)) {
            $smarty->append('messages', 'Okres kredytowania musi być liczbą');
        }
        if (!is_numeric($rate)) {
            $smarty->append('messages', 'Oprocentowanie nie jest liczbą');
        }

    }

// 3. wykonaj zadanie jeśli wszystko w porządku

    if (empty ($smarty->getTemplateVars('messages'))) { // gdy brak błędów

        //konwersja parametrów na int
        $loan = floatval($loan);
        $years = intval($years);

        //wykonanie operacji z zaokrągleniem wyniku w górę do 2 miejsc
        $result = ceil($loan / ($years * 12) * (1 + ($rate / 100)) * 100) / 100;
        $smarty->assign('result', $result);
    }

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$loan,$years,$rate,$result)
//   będą dostępne w dołączonym skrypcie
}
$years_drop = [];
for ($i = 1; $i <= 30; $i++) {
    if ($i == 1) $label = ' ROK';
    elseif ($i % 10 >= 2 && $i % 10 <= 4 && ($i < 10 || $i > 20)) $label = ' LATA';
    else $label = ' LAT';

    $years_drop[] = ['value' => $i, 'label' => $i . $label];
}
$smarty->assign('years_drop', $years_drop);
$smarty->setTemplateDir(_ROOT_PATH . '/templates/');

$smarty->assign('loan', $loan);
$smarty->assign('defYear', $years);
$smarty->assign('rate', $rate);
$smarty->assign('splash_page', true);
$smarty->assign('calc_page', true);
$smarty->assign('page_title', "Kalkulator kredytowy");
$smarty->assign('isLogged', $isLogged);
$smarty->display('main.tpl');
