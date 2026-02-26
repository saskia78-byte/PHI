<h1>Modifier un article</h1>

<form method="POST" action="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/editArticle">
    <input type="hidden" name="idArticle" value="<?= $article->getIdArticle() ?>">
    <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $article->getTitre() ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5" required><?= $article->getDescription() ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/dashboard" class="btn btn-secondary">Annuler</a>
</form>

<form method="POST" action="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/deleteArticle">
    <input type="hidden" name="idArticle" value="<?= $article->getIdArticle() ?>">
    <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer cet article ?')">Supprimer</button>
</form>