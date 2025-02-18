<?php
class TaskController
{
    private $db;
    private $task;

    public function __construct()
    {
        Auth::check();
        $database = new Database();
        $this->db = $database->getConnection();
        $this->task = new Task($this->db);
    }

    public function index()
    {
        $page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
        if ($page < 1) $page = 1;

        $result = $this->task->getAllByUser($_SESSION['user_id'], $page);

        $content = '../views/tasks/index.php';
        require_once '../views/main.php';
        exit;
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->task->title = isset($_POST['title']) ? $_POST['title'] : '';
            $this->task->description = isset($_POST['description']) ? $_POST['description'] : '';
            $this->task->status = isset($_POST['status']) ? $_POST['status'] : 'À faire';
            $this->task->user_id = $_SESSION['user_id'];

            if ($this->task->create()) {
                header('Location: index.php?page=tasks');
                exit;
            }
            $error = "Erreur lors de la création de la tâche";
        }

        $content = '../views/tasks/create.php';
        require_once '../views/main.php';
        exit;
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!$id) {
            header('Location: index.php?page=tasks');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->task->id = $id;
            $this->task->title = isset($_POST['title']) ? $_POST['title'] : '';
            $this->task->description = isset($_POST['description']) ? $_POST['description'] : '';
            $this->task->status = isset($_POST['status']) ? $_POST['status'] : '';
            $this->task->user_id = $_SESSION['user_id'];

            if ($this->task->update()) {
                header('Location: index.php?page=tasks');
                exit;
            }
            $error = "Erreur lors de la modification de la tâche";
        }

        $task = $this->task->getById($id);
        if (!$task || $task['user_id'] != $_SESSION['user_id']) {
            header('Location: index.php?page=tasks');
            exit;
        }

        $content = '../views/tasks/edit.php';
        require_once '../views/main.php';
        exit;
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_POST['task_id']) ? $_POST['task_id'] : null;
            if ($id) {
                $this->task->id = $id;
                $this->task->user_id = $_SESSION['user_id'];

                if ($this->task->delete()) {
                    header('Location: index.php?page=tasks');
                    exit;
                }
            }
        }
        header('Location: index.php?page=tasks');
        exit;
    }
}
