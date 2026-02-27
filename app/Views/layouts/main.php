<?php
ini_set('display-errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= URL_ROOT_PUBLIC ?>">PHI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL_ROOT_PUBLIC ?>/index.php?url=pages/home">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Approvisionnement</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= URL_ROOT_PUBLIC ?>/index.php?url=approvisionnement/collecteRadio">Collecte radio</a></li>
                        <li><a class="dropdown-item" href="<?= URL_ROOT_PUBLIC ?>/index.php?url=approvisionnement/collecteMateriel">Collecte matériel</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Mobilisation</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= URL_ROOT_PUBLIC ?>/index.php?url=mobilisation/ukraine">Ukraine</a></li>
                        <li><a class="dropdown-item" href="<?= URL_ROOT_PUBLIC ?>/index.php?url=mobilisation/senegal">Sénégal</a></li>
                        <li><a class="dropdown-item" href="<?= URL_ROOT_PUBLIC ?>/index.php?url=mobilisation/mayotte">Mayotte</a></li>
                        <li><a class="dropdown-item" href="<?= URL_ROOT_PUBLIC ?>/index.php?url=mobilisation/birmanie">Birmanie</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL_ROOT_PUBLIC ?>/index.php?url=pages/actualites">Actualités</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL_ROOT_PUBLIC ?>/index.php?url=pages/contact">Contact</a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-3">
                <?php if (isset($_SESSION['id_user'])) : ?>
                    <?php if ($_SESSION['role'] === 'admin') : ?>
                        <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/dashboard" class="btn btn-warning btn-sm">Dashboard Admin</a>
                    <?php else : ?>
                        <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=users/dashboard" class="btn btn-secondary btn-sm">Mon espace</a>
                    <?php endif; ?>
                    <span class="text-white">Bonjour, <?= htmlspecialchars($_SESSION['login']) ?></span>
                    <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=users/logout" class="btn btn-outline-light btn-sm">Déconnexion</a>
                <?php endif; ?>
                <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=pages/nousoutenir" class="btn btn-danger">Nous soutenir</a>
            </div>
        </div>
    </div>
</nav>

<main class="container my-4">
    <?= $content ?? '' ?>
</main>

<footer class="bg-dark text-white py-4 mt-5">
    <div class="container text-center">
        <p>&copy; <?= date('Y') ?> <?= SITE_NAME ?> - Tous droits réservés</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>