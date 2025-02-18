<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Modifier la tâche</div>
            <div class="card-body">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <form method="POST" action="index.php?page=edit-task&id=<?= htmlspecialchars($task['id']) ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?= htmlspecialchars($task['description']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Statut</label>
                        <select class="form-control" id="status" name="status">
                            <option value="À faire" class="text-warning"
                                <?= $task['status'] == 'À faire' ? 'selected' : '' ?>>
                                À faire
                            </option>
                            <option value="En cours" class="text-primary"
                                <?= $task['status'] == 'En cours' ? 'selected' : '' ?>>
                                En cours
                            </option>
                            <option value="Terminé" class="text-success"
                                <?= $task['status'] == 'Terminé' ? 'selected' : '' ?>>
                                Terminé
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="index.php?page=tasks" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</div>