<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Entrega extends Model
{
    public function atualizarStatus($pedido_id, $status)
    {
        $sql = "UPDATE pedidos 
                SET status = :status, updated_at = NOW()
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            "status" => $status,
            "id" => $pedido_id
        ]);
    }

    public function getHistoricoCliente($cliente_id)
    {
        $sql = "SELECT * FROM pedidos 
                WHERE cliente_id = :cliente_id 
                ORDER BY id DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":cliente_id", $cliente_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
