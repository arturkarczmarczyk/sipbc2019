<?php

require __DIR__ . '/../header.php';
/** @var $book \App\Model\Book */

?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Książki</h1>
    <p class="lead">Edycja książki <?= $book->getId() ?></p>
</div>

<div class="container">

    <form method="post" action="/index.php?action=books_edit">
        <div class="form-group row">
            <label for="author" class="col-sm-2 col-form-label">Autor</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" name="author" value="<?= $book->getAuthor() ?>" placeholder="Autor">
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Tytuł</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="<?= $book->getTitle() ?>" placeholder="Tytuł">
            </div>
        </div>
        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label">Rok</label>
            <div class="col-sm-10">
                <input type="number" step="1" class="form-control" id="year" name="year" value="<?= $book->getYear()?>" placeholder="Rok wydania">
            </div>
        </div>
        <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label">Miejscowość wydania</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="location" name="location" value="<?= $book->getLocation() ?>" placeholder="Miejscowość wydania">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
        </div>

        <input type="hidden" name="id" value="<?= $book->getId() ?>">
    </form>



<?php require __DIR__ . '/../footer.php'; ?>