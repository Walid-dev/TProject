<?php
abstract class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=toronto;charset=utf8', 'root', 'root');
        return $db;
    }
}
