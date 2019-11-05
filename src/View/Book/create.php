<?php require __DIR__ . '/../header.php'; ?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Książki</h1>
    <p class="lead">Dodawanie nowej książki</p>
</div>

<div class="container">

    <form method="post" action="/index.php?action=books_create">
        <div class="form-group row">
            <label for="author" class="col-sm-2 col-form-label">Autor</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" name="author" placeholder="Autor">
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Tytuł</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" placeholder="Tytuł">
            </div>
        </div>
        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label">Rok</label>
            <div class="col-sm-10">
                <input type="number" step="1" class="form-control" id="year" name="year" placeholder="Rok wydania">
            </div>
        </div>
        <div class="form-group row">
            <label for="location" class="col-sm-2 col-form-label">Miejscowość wydania</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="location" name="location" placeholder="Miejscowość wydania">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>
        </div>
    </form>



<?php require __DIR__ . '/../footer.php'; ?>