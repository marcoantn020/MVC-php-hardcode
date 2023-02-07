<?php
session_start();

require "../vendor/autoload.php";

//$whoops = new \Whoops\Run;
//$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
//$whoops->allowQuit(false);
//$whoops->writeToOutput(false);

use app\core\AppExtract;
use app\core\MyApp;

try {
    $myApp = new MyApp(new AppExtract);
    $myApp->controller();
    $myApp->view();
} catch (Exception $e) {
    var_dump($e);
//    echo $whoops->handleException($e);
}