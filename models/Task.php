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
}
