<?php
require __DIR__ . '/../header.php';
/** @var $auth array */

?>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Logowanie</h1>
    <p class="lead">Podaj swoje dane aby rozpocząć przygodę</p>
</div>

<div class="container">

    <?php if (isset($auth['errors'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= $auth['errors'] ?>
        </div>
    <?php endif; ?>

    <form class="form-signin" action="index.php?action=login" method="post">
        <label for="inputEmail" class="sr-only">Adres email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Adres email" required autofocus name="auth[email]" value="<?= $auth['email'] ?>">
        <label for="inputPassword" class="sr-only">Hasło</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Hasło" required name="auth[password]">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj!</button>
    </form>



<?php require __DIR__ . '/../footer.php'; ?>