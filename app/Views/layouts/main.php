<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Bienvenue <?php if (isset($_SESSION['username'])) : ?>
        <?php echo htmlspecialchars($_SESSION['username']); ?>
        <?php endif; ?></h1>
    </header>
    <main>
        <?= $content ?? ''; ?>
        <pre><?php print_r($users); ?></pre>

    </main>
    <footer>

    </footer>
</body>
</html>