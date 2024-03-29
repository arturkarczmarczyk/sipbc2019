<?php

/** @var $books \App\Model\Book[] */

require __DIR__ . '/../header.php';

?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Książki</h1>
    <p class="lead">Baza książek dostępnych w Bibliotece.</p>
</div>

<div class="container">

    <div>
        Nie ma książki której szukasz? Stwórz tutaj!

        <a href="/index.php?action=books_create" class="btn btn-primary">Create</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tytuł</th>
            <th scope="col">Autor</th>
            <th scope="col">Rok</th>
            <th scope="col">Miasto</th>
            <th scope="col">Akcje</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book): ?>
            <tr>
                <th scope="row"><?= $book->getId() ?></th>
                <td><?= $book->getTitle() ?></td>
                <td><?= $book->getAuthor() ?></td>
                <td><?= $book->getYear() ?></td>
                <td><?= $book->getLocation() ?></td>
                <td>
                    <a href="/index.php?action=books_edit&id=<?= $book->getId() ?>" class="btn btn-primary">Edytuj</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php require __DIR__ . '/../footer.php'; ?>