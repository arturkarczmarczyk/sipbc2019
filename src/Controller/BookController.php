<?php


namespace App\Controller;


class BookController
{
    public static function testAction()
    {
        $rand = rand(1,100);
        echo $rand;
    }

    public static function listAction()
    {
        $user = 'homestead';
        $pass = 'secret';
        $dbname = 'sipbc';
        $dbh = new \PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);

        $books = [];
        foreach($dbh->query('SELECT * from book') as $row) {
            $books[] = $row;
        }
        $dbh = null;

        require_once __DIR__ . '/../View/Book/list.php';
        echo 'juz!';
    }

    public static function createAction()
    {
        if (isset($_REQUEST['author'])) {
            // walidacja danych
            if (
            ! (
                isset($_REQUEST['author']) && ! empty($_REQUEST['author'])
                && isset($_REQUEST['title']) && ! empty($_REQUEST['title'])
                && isset($_REQUEST['year']) && ! empty($_REQUEST['year'])
                && isset($_REQUEST['location']) && ! empty($_REQUEST['location'])
            )
            ) {
                die("Nieprawidlowe dane");
            }

            $author = $_REQUEST['author'];
            $title = $_REQUEST['title'];
            $year = $_REQUEST['year'];
            $location = $_REQUEST['location'];

            // zapis do db
            $user = 'homestead';
            $pass = 'secret';
            $dbname = 'sipbc';
            $dbh = new \PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);
            $sql = "INSERT INTO book(title, author, year, location) VALUES ('$title', '$author', '$year', '$location')";
            $dbh->query($sql);

            // przekierowanie na liste
            die('DOBRZE! Dodany');


        } else {
            require __DIR__ . '/../View/Book/create.php';
        }


    }
}