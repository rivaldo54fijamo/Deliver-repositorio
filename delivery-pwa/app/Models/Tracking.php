<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Tracking extends Model
{
    public function updateLocation($motorista_id, $pedido_id, $lat, $lng)
    {
        $sql = "INSERT INTO tracking (motorista_id, pedido_id, lat, lng)
                VALUES (:motorista_id, :pedido_id, :lat, :lng)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            "motorista_id" => $motorista_id,
            "pedido_id" => $pedido_id,
            "lat" => $lat,
            "lng" => $lng
        ]);
    }

    public function getLatest($pedido_id)
    {
        $sql = "SELECT * FROM tracking 
                WHERE pedido_id = :pedido_id 
                ORDER BY id DESC 
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":pedido_id", $pedido_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
