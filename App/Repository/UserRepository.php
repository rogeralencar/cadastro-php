<?php

namespace App\Repository;
use App\Db\Database;
use App\Entity\User;
use App\DTO\UserDTO;
use PDO;

class UserRepository extends Database
{
    /**
     * Insere os dados no banco de dados.
     * @param $values
     * @return mixed
     */
    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO users (' .implode(',', $fields). ') VALUES (' .implode(',', $binds). ')';
        $this->execute($query, array_values($values));
        return $this->conn->lastInsertId();
    }

    /**
     * Lista todos os dados do banco de dados.
     * @return mixed
     */
    public function listAll()
    {
        $query = 'SELECT * FROM users;';
        return $this->execute($query)->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    public function listById($id)
    {
        $query = 'SELECT * FROM users WHERE id='.$id;
        return $this->execute($query)->fetchObject(User::class);
    }

    /**
     * Lista como DTO os dados do banco de dados.
     * @return mixed
     */
    public function listAllDTO()
    {
        $query = 'SELECT * FROM users;';
        return $this->execute($query)->fetchAll(PDO::FETCH_CLASS, UserDTO::class);
    }

    public function update($values, $id)
    {
        $fields = array_keys($values);

        $query = 'UPDATE users SET '. implode('=?', $fields). '=? WHERE id='. $id;
        return $this->execute($query, array_values($values));
    }

    public function delete($id)
    {
        $query = 'DELETE FROM users WHERE id='.$id;

        return $this->execute($query);
    }
}