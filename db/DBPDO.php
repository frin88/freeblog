<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\DB;

/**
 * classe per creare connessione al database (pattern singleton)
 */
class DBPDO
{
    protected $conn;
    protected static $instance; //static proprietà della classe non dell'istanza

    public static function getInstance(array $options)
    {
        //self invece di this perchè mi riferisco alla classe non all'istanza
        if (!self::$instance) {
            self::$instance = new static ($options);
        }
        return static::$instance;
    }

    protected function __construct(array $options)
    {
        // leggo da array
        $this->conn = new \PDO($options['dsn'], $options['user'], $options['password'], $options['pdooptions']);
    }

    public function getConn()
    {
        return $this->conn;
    }

}
