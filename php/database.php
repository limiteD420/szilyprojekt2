<?php
class DB
{
    private static $pdo;

    public static function connect()
    {
        $dsn = 'mysql:host=localhost;dbname=projekt_adatbazis';
        $username = 'root';
        $password = '';
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        self::$pdo = new PDO($dsn, $username, $password, $options);
    }

    public static function query($sql, $params = array()) //SQL Injection ellen véd
    {   
        self::connect();
        $stmt = self::$pdo->prepare($sql); //Megnézi szintaktikailag, hogy helyes-e a lekérdezés
        $stmt->execute($params); //Valójában le is futtatja a paraméter alapján
        return $stmt->fetchAll(PDO::FETCH_ASSOC); //<pre> taggel szépen ki lehet íratni
    }
}