<?php
require_once __DIR__ . '/../config/dbconfig.php';
require_once  __DIR__ . '/../vendor/autoload.php';

session_start();

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



        case 'login':
            \App\Controller\AuthController::loginAction();
            break;



        default:
            header('Location: /index.php?action=books_list');
            break;
    }
} else {
    header('Location: /index.php?action=books_list');
}
