<?php
class TaskController
{
    private $db;
    private $task;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function index()
    {
        require_once 'views/tasks/index.php';
    }

    public function create()
    {
        require_once 'views/tasks/create.php';
    }
}
