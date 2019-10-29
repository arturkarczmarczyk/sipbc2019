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

        foreach($dbh->query('SELECT * from book') as $row) {
            print_r($row);
        }
        $dbh = null;
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


            $form = <<<EOT
        
<html lang="pl">
<body>
<form method="post">
    <label for="author">Autor:</label>
    <input type="text" name="author" value="" id="author">
    
    <label for="title">Tytuł:</label>
    <input type="text" name="title" value="" id="title">
    
    <label for="year">Rok:</label>
    <input type="number" name="year" value="2019" id="year" step="1">
    
    <label for="location">Miejsce wydania:</label>
    <input type="text" name="location" value="" id="location">
    
    <input type="submit" value="Zapisz">
</form>
</body>
</html>        
        
EOT;

            echo $form;


        }


    }
}