<h1>Ajouter un podcast</h1>

<form method="POST" action="<?= URL_ROOT_PUBLIC ?>/index.php?url=admin/addPodcast">
    <div class="mb-3">
        <label for="titre" class="form-label">Titre</label>
        <input type="text" class="form-control" id="titre" name="titre" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>