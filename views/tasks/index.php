<div class="row mb-4">
    <div class="col">
        <h1 class="mainTitle">
            Mes Tâches
        </h1>
    </div>
    <div class="col text-end">
        <a href="index.php?page=create-task" class="btn btn-primary">
            Nouvelle Tâche
        </a>
    </div>
</div>

<div class="row">
    <?php if (empty($result['tasks'])): ?>
        <div class="col">
            <div class="alert alert-info">
                Vous n'avez pas encore de tâches.
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($result['tasks'] as $task): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 task-card task-status-<?= strtolower(str_replace(' ', '', $task['status'])) ?>">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title"><?= htmlspecialchars($task['title']) ?></h5>
                            <span class="status-badge status-<?= strtolower(str_replace(' ', '', $task['status'])) ?>">
                                <?= htmlspecialchars($task['status']) ?>
                            </span>
                        </div>
                        <p class="card-text"><?= htmlspecialchars($task['description']) ?></p>
                        <div class="mt-3">
                            <div class="btn-group">
                                <a href="index.php?page=edit-task&id=<?= $task['id'] ?>"
                                    class="btn btn-outline-primary btn-sm">
                                    Modifier
                                </a>
                                <form method="POST" action="index.php?page=delete-task" class="d-inline">
                                    <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
                                    <button type="submit"
                                        class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Êtes-vous sûr ?')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php if ($result['pages'] > 1): ?>
    <nav aria-label="Navigation des pages">
        <ul class="pagination justify-content-center">
            <?php if ($result['current_page'] > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=tasks&p=<?= $result['current_page'] - 1 ?>">Précédent</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $result['pages']; $i++): ?>
                <li class="page-item <?= $i == $result['current_page'] ? 'active' : '' ?>">
                    <a class="page-link" href="index.php?page=tasks&p=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($result['current_page'] < $result['pages']): ?>
                <li class="page-item">
                    <a class="page-link" href="index.php?page=tasks&p=<?= $result['current_page'] + 1 ?>">Suivant</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>