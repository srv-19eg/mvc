<?php
// Leta upp och definiera rotmappen för projektet
define('ROOT', dirname(__DIR__));

require_once ROOT . "/vendor/autoload.php";
require_once ROOT . "/vendor/pecee/simple-router/helpers.php";
session_start();

use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter;



SimpleRouter::setDefaultNamespace('\App\Controllers');

require_once ROOT . "/App/routes.php";

SimpleRouter::error(function(Request $request, \Exception $exception) {
    switch($exception->getCode()) {
        case 404:
            echo "404. Hittade inte rutten.<br>" ;
            echo "Metod: <strong>".request()->getMethod()."</strong><br>";
            echo "URL: <strong>".request()->getURL()."</strong><br>";
            echo "Data i session, get och post följer.<br>";
            var_dump($_SESSION);
            var_dump($_GET);
            var_dump($_POST);
            exit();

            // Inställt för utveckling. Aktivera redirect till / eller egen 404-sida istället när du är i produktion.
            // response()->redirect('/');
//            break;

        default:
            echo "Något gick fel med rutterna. Stannar körning.<br>";
            echo "Metod: <strong>".request()->getMethod()."</strong><br>";
            echo "URL: <strong>".request()->getURL()."</strong><br>";
            echo "Data i session, get och post följer.<br>";
            var_dump($_SESSION);
            var_dump($_GET);
            var_dump($_POST);
            exit();

        // Inställt för utveckling. Aktivera redirect till / eller egen 404-sida istället när du är i produktion.
        // response()->redirect('/');
    }
});

SimpleRouter::start();