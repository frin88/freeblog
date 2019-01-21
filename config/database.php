<?php
//PDO
return[
    'driver' => 'mssql', // può essere sqlite, mssql, oci
    'host' => '161.',
    'user' => 'root',
    'password' => 'hidran',
    'database' => 'freeblog',
    //'dsn' => 'mysql:host=localhost;dbname=freeblog;charset=utf8',
    'pdooptions' => [
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    ]
];
