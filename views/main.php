<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de Tâches Collaboratives</title>
</head>

<body>
    <header>
        <nav>
            <a href="/">Accueil</a>
            <a href="/users">Utilisateurs</a>
            <a href="/tasks">Tâches</a>
        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Application de Tâches Collaboratives</p>
    </footer>
</body>

</html>