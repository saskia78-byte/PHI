<h1>Ajouter un média</h1>

<form method="POST" action="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/addMedia">
    <div class="mb-3">
        <label for="image" class="form-label">Image (URL)</label>
        <input type="text" class="form-control" id="image" name="image">
    </div>
    <div class="mb-3">
        <label for="audio" class="form-label">Audio (URL)</label>
        <input type="text" class="form-control" id="audio" name="audio">
    </div>
    <div class="mb-3">
        <label for="video" class="form-label">Vidéo (URL)</label>
        <input type="text" class="form-control" id="video" name="video">
    </div>
    <div class="mb-3">
        <label for="idArticle" class="form-label">ID Article (optionnel)</label>
        <input type="number" class="form-control" id="idArticle" name="idArticle">
    </div>
    <div class="mb-3">
        <label for="idPodcast" class="form-label">ID Podcast (optionnel)</label>
        <input type="number" class="form-control" id="idPodcast" name="idPodcast">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
    <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/dashboard" class="btn btn-secondary">Annuler</a>
</form>