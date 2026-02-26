<h1>Actualités</h1>

<h2>Articles</h2>
<?php foreach($articles as $article) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5><?= $article->getTitre() ?></h5>
            <p><?= $article->getDescription() ?></p>
        </div>
    </div>
<?php endforeach; ?>

<h2>Podcasts</h2>
<?php foreach($podcasts as $podcast) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <h5><?= $podcast->getTitre() ?></h5>
            <p><?= $podcast->getDescription() ?></p>
        </div>
    </div>
<?php endforeach; ?>