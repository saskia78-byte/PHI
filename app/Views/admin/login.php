<?php if (!empty($error)) : ?>
    <div> <?= $error; ?> </div>
<?php endif; ?>

<form action="?controller=users&action=login" method="post">
    Login : <input type="text" name="username">
    Password : <input type="text" name="password">
    <input type="submit" value="Connexion">
</form>