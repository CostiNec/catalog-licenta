<?php

use core\Model;
use core\Controller;
use core\Helper;
use core\Exception as CatchError;
use providers\ApplicationProvider;
require_once __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\','/',$class_name);
    if(file_exists(__DIR__.'/../'.$class_name.'.php')) {
        require __DIR__.'/../'.$class_name.'.php';
    }
});

require_once 'functions.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    session_start();
    function generate_token() {
        // Check if a token is present for the current session
        if(!isset($_SESSION["csrf_token"])) {
            // No token present, generate a new one
            $token = bin2hex(random_bytes(64));
            $_SESSION["csrf_token"] = $token;
        } else {
            // Reuse the token
            $token = $_SESSION["csrf_token"];
        }
        return $token;
    }

    $_SESSION["csrf_token"] = generate_token();
    require_once '../routes/route.php';
    $dataController = $route->execute();

    $use = '../controllers/'.$dataController['controller'].'.php';

    if(file_exists($use)) {
        require $use;
        $controller = 'controllers\\'.$dataController['controller'];
        $command = new $controller($dataController);

        if(method_exists($command, $dataController['method']))
            call_user_func(array($command, $dataController['method']),$dataController['request']);
        else {
            throw (new CatchError('The method '. $dataController['method'] .' doesn\'t exist '. $dataController['controller'] .'! :(',500));
        }
    } else {
        throw (new CatchError('The controller '. $dataController['controller'] .' doesn\'t exist! :(',500));
    }

} catch (CatchError $catchError) {
    $catchError->render();
}


