<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class User extends Model
{
    public function findByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO users 
        (username, nome, apelido, bi, telefone, morada, ano_nascimento, email, password, role)
        VALUES
        (:username, :nome, :apelido, :bi, :telefone, :morada, :ano_nascimento, :email, :password, :role)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute($data);
    }
}
