<?php
abstract class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=toronto;charset=utf8', 'root', 'root');
        return $db;
    }
}


// LocalHost 
{
    function dbConnect2()
    {
        $host_name = 'db5000263395.hosting-data.io';
        $database = 'dbs256986';
        $user_name = 'dbu216454';
        $password = 'Walidmhsc34-';
        $db = null;

        try {
            $db = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
            return $db;
        } catch (PDOException $e) {
            echo "Erreur!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
