<?php
class User
{
    private $conn;

    public $id;
    public $name;
    public $email;
    public $password;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO  users SET name=:name, email=:email, password=:password";

        $createUserQuery = $this->conn->prepare($query);

        $createUserQuery->bindParam(":name", $this->name);
        $createUserQuery->bindParam(":email", $this->email);
        $createUserQuery->bindParam(":password", $this->password);

        return $createUserQuery->execute();
    }
}
