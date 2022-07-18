<?php

namespace App\Controller;
use App\Entity\User;
use App\Repository\UserRepository;
use App\DTO\UserDTO;

class UserController extends User
{
    /**
     * Responsável por criar um novo usuário no banco de dados.
     * @param $name
     * @param $pass
     * @param $email
     * @return bool
     */
    public function createUser($name, $pass, $email)
    {
        $repo = new UserRepository;
        $user = new UserDTO();
        $objUser = new User;
        $objUser->id = $repo->insert([
            'name' => $name,
            'pass' => $pass,
            'email' => $email
        ]);

        $user->getName($name);
        $user->getEmail($email);
        return true;
    }

    /**
     * Lista todos os usuários do banco de dados.
     * @return mixed
     */
    public static function listAllUsers()
    {
        $repo = new UserRepository;
        return $repo->listAll();
    }

    public static function listById($id)
    {
        $repo = new UserRepository;
        return $repo->listById($id);
    }

    /**
     * Lista como DTO todos os usuários do banco de dados.
     * @return mixed
     */
    public static function listAllUsersDTO()
    {
        $repo = new UserRepository;
        return $repo->listAllDTO();
    }

    public function updateUser($id, $name, $pass, $email)
    {
        $repo = new UserRepository();
        return $repo->update(['name' => $name,
            'pass' => $pass,
            'email' => $email], $id);
    }

    public function deleteUser($id)
    {
        $repo = new UserRepository();
        return $repo->delete($id);
    }
}