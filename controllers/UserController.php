<?php

class UserController
{
    private $db;
    private $user;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function index()
    {
        require_once 'views/users/index.php';
    }

    public function create()
    {
        require_once 'views/users/create.php';
    }
}
