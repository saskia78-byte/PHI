<h1>Modifier un podcast</h1>

<form method="POST" action="<?= URL_ROOT_PUBLIC ?>/index.php?url=users/editPodcast">
    <input type="hidden" name="idPodcast" value="<?= $podcast->getIdPodcast() ?>">
    <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $podcast->getTitre() ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5" required><?= $podcast->getDescription() ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=users/dashboard" class="btn btn-secondary">Annuler</a>
</form>