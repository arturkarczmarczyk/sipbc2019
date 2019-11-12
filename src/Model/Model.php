<?php


namespace App\Model;


abstract class Model
{
    /**
     * @return \PDO
     */
    public static function getConnection()
    {
        global $dbConfig;

        $user = $dbConfig['user'];
        $pass = $dbConfig['pass'];
        $dbname = $dbConfig['name'];
        $host = $dbConfig['host'];

        $dbh = new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

        return $dbh;
    }
}