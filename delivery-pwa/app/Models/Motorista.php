<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Motorista extends Model
{
    public function setStatus($id, $status)
    {
        $sql = "UPDATE users SET online = :status WHERE id = :id AND role = 'motorista'";
        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    public function getOnlineDrivers()
    {
        $sql = "SELECT * FROM users WHERE role = 'motorista' AND online = 1";
        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
