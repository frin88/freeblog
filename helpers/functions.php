<?php

function view($view, array $data = []){

//
//    $arr = array("disney"=>['pippo','pluto']);
//  //  var_dump($disney); questo ovviamente da errore
//    var_dump($arr['disney']); //$arr è un array associativo multidim
//    extract($arr); // con extract sto implicitament creando ('importando') la variabile $post
//    var_dump($disney); // ora la variabile $disney esiste

    if(count($data) >0)
    {
        extract($data);
    }


    ob_start();

   // echo __DIR__.'/../app/views/'.$view.'.tpl.php';
    require __DIR__.'/../app/views/'.$view.'.tpl.php';

    $data = ob_get_contents();
    ob_end_clean();
    return $data;


}

function redirect($url ='/'){
    header('Location:'.$url);
    exit;
}