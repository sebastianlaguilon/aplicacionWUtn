<?php

class Conexion
{

    static public function conectar()
    {

        $host = 'localhost';
        $dbname = 'gastostotal';
        $username = 'root';
        $password = '';
        $port = 3310;

        try {
            $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }
}

/*
class Conexion
{

    static public function conectar()
    {

        $host = 'localhost';
        $dbname = 'id21234481_controlgastos';
        $username = 'id21234481_sebastian';
        $password ='Seb@s2934';
       
        
        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }
}
*/