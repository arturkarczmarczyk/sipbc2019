<?php
namespace App\Controller;

require_once __DIR__ . '/../Model/Book.php';

use App\Model\Book;

class BookController
{
    public static function testAction()
    {
        $rand = rand(1,100);
        echo $rand;
    }

    public static function listAction()
    {
        $books = Book::fetchAll();

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

            $book = new Book();

            $book->setAuthor($_REQUEST['author']);
            $book->setTitle($_REQUEST['title']);
            $book->setYear($_REQUEST['year']);
            $book->setLocation($_REQUEST['location']);
            $book->save();

            // przekierowanie na liste
            header('Location: /index.php?action=books_list');

        } else {
            require __DIR__ . '/../View/Book/create.php';
        }


    }
}