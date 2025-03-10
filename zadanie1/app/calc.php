<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$loan = $_REQUEST ['loan'];
$years = $_REQUEST ['years'];
$rate = $_REQUEST ['rate'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($loan) && isset($years) && isset($rate))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $loan == "") {
	$messages [] = 'Nie podano kwoty pożyczki';
}
if ( $years == "") {
	$messages [] = 'Nie podano okresu kredytowania';
}
if ( $rate == "") {
    $messages [] = 'Nie podano oprocentowania';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $loan i $years są liczbami całkowitymi
	if (! is_numeric( $loan )) {
		$messages [] = 'Kwota pożyczki nie jest liczbą';
	}

	if (! is_numeric( $years )) {
		$messages [] = 'Okres kredytowania musi być liczbą';
	}
    if (! is_numeric( $rate )) {
        $messages [] = 'Oprocentowanie nie jest liczbą';
    }

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$loan = floatval($loan);
	$years = intval($years);
	
	//wykonanie operacji z zaokrągleniem wyniku w górę do 2 miejsc
	$result = ceil($loan / ($years * 12) * (1 + ($rate / 100))*100)/100;
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$loan,$years,$rate,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';