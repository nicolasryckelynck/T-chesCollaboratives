<?php

class UserController
{
    private $db;
    private $user;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function index()
    {
        Auth::guest();
        require_once 'views/users/index.php';
    }

    public function create()
    {
        require_once 'views/users/create.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->name = isset($_POST['name']) ? $_POST['name'] : '';
            $this->user->email = isset($_POST['email']) ? $_POST['email'] : '';
            $this->user->password = password_hash(isset($_POST['password']) ? $_POST['password'] : '', PASSWORD_DEFAULT);

            if ($this->user->create()) {
                header('Location: index.php');
                exit;
            }
            $error = "Erreur lors de l'inscription";
        }
        $content = '../views/users/create.php';
        require_once '../views/main.php';
        exit;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            if ($this->user->login($email, $password)) {
                header('Location: index.php?page=tasks');
                exit;
            }
            $error = "Email ou mot de passe incorrect";
        }
        $content = '../views/users/index.php';
        require_once '../views/main.php';
        exit;
    }
}
