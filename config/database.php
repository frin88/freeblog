<?php
//PDO PHP DBObject --> interfaccia per database ritorna arrai di parametri
return[
    'driver' => 'mysql', // può essere sqlite, mssql, oci
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'database' => 'freeblog',
    'dsn' => 'mysql:host=localhost;dbname=freeblog;charset=utf8',
    'pdooptions' => [
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ], // configurazioni pdo
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    ]
];
