<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="WIZUT JEST NAJLEPSZY">
    <title>Biblioteka</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/custom.css" rel="stylesheet">
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Biblioteka</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/index.php?action=books_list">Książki</a>
        <a class="p-2 text-dark" href="#">Wypożyczenia</a>
    </nav>
    <?php if (\App\Util\AuthUtil::getCurrentUser()): ?>
        <a class="btn btn-outline-primary" href="#"><?= \App\Util\AuthUtil::getCurrentUser()->getLogin() ?></a>
    <?php else: ?>
        <a class="btn btn-outline-primary" href="/index.php?action=login">Zaloguj</a>
    <?php endif; ?>
</div>