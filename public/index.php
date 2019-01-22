<?php


//echo 'index loaded correctly ';

// set current working directory
chdir(dirname(__DIR__));

// load PostController in index --> require genera fatal error se non trov il file (include genera un warning)
//  se in pagina non ho errori ha caricato
require_once __DIR__ . '/../app/controllers/PostController.php';

// istanzio la classe postController
$controller = new \App\Controllers\PostController();
// lo show va prima di display perchè è quello che carica i contenuti e li cattura con ob_start();

$controller->show(1);
$controller->display();











/* FINAL CODE FROM TUTORIAL
chdir(dirname(__DIR__));
require_once __DIR__.'/../core/bootstrap.php';

$data = require 'config/database.php';

$appConfig = require 'config/app.config.php';

try{

$conn = App\db\DbFactory::create($data)->getConn();

$router = new Router($conn);

$router->loadRoutes($appConfig['routes']);

$controller = $router->dispatch();

$controller->display();

} catch(\PDOException $e){
    echo $e->getMessage();
}

 die();

$controller->show(1);
$controller->display();

*/