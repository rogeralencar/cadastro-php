<?php

namespace App\Db;
use PDO;
use PDOException;

class Database {
    protected $conn;

    public function __construct()
    {
        $this->setConnection();
    }

    /**
     * Realiza a conexão com o banco de dados MySQL.
     * @return PDO
     */
    public function setConnection()
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=Alunos', 'root', '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    /**
     * Executa o código sql no banco de dados.
     * @param $sql
     * @param $params
     * @return void
     */
    public function execute($sql, $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
}