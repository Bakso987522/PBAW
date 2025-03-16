<?php
require_once dirname(__FILE__).'/../../config.php';
require_once _ROOT_PATH.'/app/security/AuthController.php';
// Utworzenie obiektu kontrolera logiowania
$controller = new AuthController();
// Wywołanie metody logowania

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logowanie</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Logowanie</h2>
        <form action="<?php echo _APP_URL; ?>/app/security/login.php" method="post">
            <div class="mb-4">
                <label for="login" class="block text-gray-700">Login</label>
                <input type="text" id="login" name="login" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <label for="pass" class="block text-gray-700">Hasło</label>
                <input type="password" id="pass" name="pass" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex justify-between items-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Zaloguj się</button>
            </div>
        </form>
    </div>
</div>
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
</body>
</html>