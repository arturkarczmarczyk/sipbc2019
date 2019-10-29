<?php
require_once __DIR__ . '/../src/Controller/BookController.php';


if (isset($_REQUEST['action'])) {

    switch ($_REQUEST['action']) {
        case 'books_list':
            \App\Controller\BookController::listAction();
            break;
        case 'books_create':
            \App\Controller\BookController::createAction();
            break;
        default:
            header('Location: /public/index.php?action=books_list');
            break;
    }
}
