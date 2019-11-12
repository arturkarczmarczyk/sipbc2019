<?php
require_once __DIR__ . '/../config/dbconfig.php';
require_once __DIR__ . '/../src/Controller/BookController.php';
require_once __DIR__ . '/../src/Model/Book.php';

if (isset($_REQUEST['action'])) {

    switch ($_REQUEST['action']) {
        case 'books_list':
            \App\Controller\BookController::listAction();
            break;
        case 'books_create':
            \App\Controller\BookController::createAction();
            break;
        case 'books_edit':
            \App\Controller\BookController::editAction();
            break;
        default:
            header('Location: /index.php?action=books_list');
            break;
    }
} else {
    header('Location: /index.php?action=books_list');
}
