<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de Tâches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                Tâches collaboratives
            </a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="navbar-nav">
                    <a class="nav-link" href="index.php?page=tasks">
                        Mes Tâches
                    </a>
                    <a class="nav-link" href="index.php?page=logout">
                        Déconnexion
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container">
        <?php require $content; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>