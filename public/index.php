<?php

//echo 'index loaded correctly ';
//error_reporting(0); // non mostrare errori (per versione di prod)

// set current working directory
chdir(dirname(__DIR__));

//istanzio classi database ... abbiamo aggounto un layer in più per gestire diversi db... fast foward
require_once __DIR__ . '/../db/DBPDO.php'; // crea effettivamente connessione
require_once __DIR__.'/../db/DbFactory.php'; // crea connection string a seconda dei parametri di connessione
require_once __DIR__ . '/../app/controllers/PostController.php';

$data = require 'config/database.php'; //leggo parametri di connessione

try {

    $controller = new \App\Controllers\PostController((App\DB\DbFactory::create($data)->getConn())); // istanzio il controller con la connessione

    // lo show va prima di display perchè è quello che carica i contenuti e li cattura con ob_start();
    //$controller->show();
    $controller->display();


}
catch(\PDOException $e){
    echo $e->getMessage();
}

// load PostController in index --> require genera fatal error se non trova il file (include genera un warning)
//  se in pagina non ho errori ha caricato


// istanzio la classe postController













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