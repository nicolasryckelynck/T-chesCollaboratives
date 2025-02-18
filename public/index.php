<?php
session_start();

require_once '../config/Database.php';
require_once '../models/User.php';
require_once '../models/Task.php';
require_once '../controllers/UserController.php';
require_once '../controllers/TaskController.php';
require_once '../middleware/Auth.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$userController = new UserController();
$taskController = new TaskController();

switch ($page) {
    case 'register':
        $userController->register();
        exit;
    case 'login':
        $userController->login();
        exit;
    case 'tasks':
        $taskController->index();
        exit;
    case 'create-task':
        $taskController->create();
        exit;
    case 'edit-task':
        $taskController->edit();
        exit;
    case 'delete-task':
        $taskController->delete();
        exit;
    default:
        $content = '../views/users/index.php';
}

require_once '../views/main.php';
