<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Nouvelle Tâche</div>
            <div class="card-body">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <form method="POST" action="index.php?page=create-task">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Statut</label>
                        <select class="form-control" id="status" name="status">
                            <option value="À faire">À faire</option>
                            <option value="En cours">En cours</option>
                            <option value="Terminé">Terminé</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Créer</button>
                    <a href="index.php?page=tasks" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>