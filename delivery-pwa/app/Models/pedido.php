<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Pedido extends Model
{
    public function create($data)
    {
        $sql = "INSERT INTO pedidos 
        (cliente_id, origem_lat, origem_lng, destino_lat, destino_lng, distancia_km, valor, status, telefone_receptor)
        VALUES
        (:cliente_id, :origem_lat, :origem_lng, :destino_lat, :destino_lng, :distancia_km, :valor, :status, :telefone_receptor)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function getByClient($cliente_id)
    {
        $sql = "SELECT * FROM pedidos WHERE cliente_id = :cliente_id ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":cliente_id", $cliente_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cancel($id)
    {
        $sql = "UPDATE pedidos SET status = 'cancelado' WHERE id = :id AND status = 'aguardando_motorista'";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }
}
