<?php
class Task
{
    private $conn;

    public $id;
    public $title;
    public $description;
    public $status;
    public $user_id;
    public $created_at;
    private $tasksPerPage = 3;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO tasks SET title=:title, description=:description, status=:status, user_id=:user_id";
        $createTaskQuery = $this->conn->prepare($query);

        $createTaskQuery->bindParam(":title", $this->title);
        $createTaskQuery->bindParam(":description", $this->description);
        $createTaskQuery->bindParam(":status", $this->status);
        $createTaskQuery->bindParam(":user_id", $this->user_id);

        return $createTaskQuery->execute();
    }

    public function getAllByUser($userId, $page = 1)
    {
        $offset = ($page - 1) * $this->tasksPerPage;

        $query = "SELECT * FROM tasks WHERE user_id = :user_id ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $getTaskByUserQuery = $this->conn->prepare($query);
        $getTaskByUserQuery->bindParam(":user_id", $userId);
        $getTaskByUserQuery->bindParam(":limit", $this->tasksPerPage, PDO::PARAM_INT);
        $getTaskByUserQuery->bindParam(":offset", $offset, PDO::PARAM_INT);
        $getTaskByUserQuery->execute();

        $countQuery = "SELECT COUNT(*) as total FROM tasks WHERE user_id = :user_id";
        $countStmt = $this->conn->prepare($countQuery);
        $countStmt->bindParam(":user_id", $userId);
        $countStmt->execute();
        $total = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];

        return [
            'tasks' => $getTaskByUserQuery->fetchAll(PDO::FETCH_ASSOC),
            'total' => $total,
            'pages' => ceil($total / $this->tasksPerPage),
            'current_page' => $page
        ];
    }

    public function getById($id)
    {
        $query = "SELECT * FROM tasks WHERE id = :id";
        $getTaskByIdQuery = $this->conn->prepare($query);
        $getTaskByIdQuery->bindParam(":id", $id);
        $getTaskByIdQuery->execute();

        return $getTaskByIdQuery->fetch(PDO::FETCH_ASSOC);
    }

    public function delete()
    {
        $query = "DELETE FROM tasks WHERE id = :id AND user_id = :user_id";
        $deleteTaskQuery = $this->conn->prepare($query);

        $deleteTaskQuery->bindParam(":id", $this->id);
        $deleteTaskQuery->bindParam(":user_id", $this->user_id);

        return $deleteTaskQuery->execute();
    }
    public function update()
    {

        $query = "UPDATE tasks SET title=:title, description=:description, status=:status WHERE id=:id AND user_id=:user_id";

        $updateTaskQuery = $this->conn->prepare($query);

        $updateTaskQuery->bindParam(":title", $this->title);
        $updateTaskQuery->bindParam(":description", $this->description);
        $updateTaskQuery->bindParam(":status", $this->status);
        $updateTaskQuery->bindParam(":id", $this->id);
        $updateTaskQuery->bindParam(":user_id", $this->user_id);
        return $updateTaskQuery->execute();
    }
}
