<h1>Dashboard Admin</h1>

<div class="row mt-4">

    <!-- Articles -->
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">Articles</h5>
                    <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/addArticle" class="btn btn-primary btn-sm">Ajouter</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($articles as $article) : ?>
                        <tr>
                            <td><?= $article->getTitre() ?></td>
                            <td><?= $article->getDateAjout() ?></td>
                            <td>
                                <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/editArticle&idArticle=<?= $article->getIdArticle() ?>" class="btn btn-warning btn-sm">Modifier</a>
                                <form method="POST" action="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/deleteArticle" class="d-inline">
                                    <input type="hidden" name="idArticle" value="<?= $article->getIdArticle() ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Podcasts -->
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">Podcasts</h5>
                    <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/addPodcast" class="btn btn-primary btn-sm">Ajouter</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($podcasts as $podcast) : ?>
                        <tr>
                            <td><?= $podcast->getTitre() ?></td>
                            <td><?= $podcast->getDateAjout() ?></td>
                            <td>
                                <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/editPodcast&idPodcast=<?= $podcast->getIdPodcast() ?>" class="btn btn-warning btn-sm">Modifier</a>
                                <form method="POST" action="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/deletePodcast" class="d-inline">
                                    <input type="hidden" name="idPodcast" value="<?= $podcast->getIdPodcast() ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Utilisateurs -->
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title mb-0">Utilisateurs</h5>
                    <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/addUser" class="btn btn-primary btn-sm">Ajouter</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Login</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user) : ?>
                        <tr>
                            <td><?= $user->getLogin() ?></td>
                            <td><?= $user->getEmail() ?></td>
                            <td>
                                <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/editUser&idUser=<?= $user->getIdUser() ?>" class="btn btn-warning btn-sm">Modifier</a>
                                <form method="POST" action="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/deleteUser" class="d-inline">
                                    <input type="hidden" name="idUser" value="<?= $user->getIdUser() ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>