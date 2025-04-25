<?php
require_once 'init.php';

getRouter()->setDefaultRoute('calcShow'); // akcja/ścieżka domyślna
getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

getRouter()->addRoute('calcShow', 'CreditController', ['user', 'admin']);
getRouter()->addRoute('calcCompute', 'CreditController', ['user', 'admin']);
getRouter()->addRoute('login', 'AuthController');
getRouter()->addRoute('logout', 'AuthController', ['user', 'admin']);
getRouter()->addRoute('showResults', 'ResultsShowController', ['admin']);

getRouter()->go();

