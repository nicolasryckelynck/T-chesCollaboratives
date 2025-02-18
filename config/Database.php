<?php
class Database
{
    private $host = "localhost";
    private $port = "8111";
    private $db_name = "taches_collaboratives";
    private $username = "root";
    private $password = "";
    private $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }

        return $this->conn;
    }
}
