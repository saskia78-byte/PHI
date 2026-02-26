<h1>Modifier un média</h1>

<form method="POST" action="<?= URL_ROOT_PUBLIC ?>/index.php?url=users/editMedia">
    <input type="hidden" name="idMedia" value="<?= $media->getIdMedia() ?>">
    <div class="mb-3">
        <label for="image" class="form-label">Image (URL)</label>
        <input type="text" class="form-control" id="image" name="image" value="<?= $media->getImage() ?>">
    </div>
    <div class="mb-3">
        <label for="audio" class="form-label">Audio (URL)</label>
        <input type="text" class="form-control" id="audio" name="audio" value="<?= $media->getAudio() ?>">
    </div>
    <div class="mb-3">
        <label for="video" class="form-label">Vidéo (URL)</label>
        <input type="text" class="form-control" id="video" name="video" value="<?= $media->getVideo() ?>">
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <form method="POST" action="<?= URL_ROOT_PUBLIC ?>/index.php?url=users/deleteMedia">
        <input type="hidden" name="idMedia" value="<?= $media->getIdMedia() ?>">
        <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('Supprimer ?')">Supprimer</button>
    </form>
    <a href="<?= URL_ROOT_PUBLIC ?>/index.php?url=users/dashboard" class="btn btn-secondary mt-2">Annuler</a>
</form>