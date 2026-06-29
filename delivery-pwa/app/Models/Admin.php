<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Admin extends Model
{
    public function getStats()
    {
        $stats = [];

        $stats['clientes'] = $this->db->query("SELECT COUNT(*) FROM users WHERE role='cliente'")->fetchColumn();
        $stats['motoristas'] = $this->db->query("SELECT COUNT(*) FROM users WHERE role='motorista'")->fetchColumn();
        $stats['pedidos'] = $this->db->query("SELECT COUNT(*) FROM pedidos")->fetchColumn();
        $stats['entregues'] = $this->db->query("SELECT COUNT(*) FROM pedidos WHERE status='entregue'")->fetchColumn();

        return $stats;
    }

    public function getUsers()
    {
        return $this->db->query("SELECT * FROM users ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function blockUser($id)
    {
        $sql = "UPDATE users SET status='bloqueado' WHERE id=:id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute(['id' => $id]);
    }

    public function unblockUser($id)
    {
        $sql = "UPDATE users SET status='ativo' WHERE id=:id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute(['id' => $id]);
    }
}
