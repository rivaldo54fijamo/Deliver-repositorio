<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Pedido;

class PedidoMotoristaController extends Controller
{
    // pedidos disponíveis
    public function disponiveis()
    {
        $pedido = new Pedido();

        $sql = "SELECT * FROM pedidos WHERE status = 'aguardando_motorista'";

        $stmt = $pedido->db->query($sql);

        echo json_encode($stmt->fetchAll());
    }

    // aceitar pedido
    public function aceitar()
    {
        Session::start();

        $pedido_id = $_POST['pedido_id'];
        $motorista_id = Session::get("user_id");

        $sql = "UPDATE pedidos 
                SET status = 'aceite', motorista_id = :motorista_id 
                WHERE id = :id AND status = 'aguardando_motorista'";

        $stmt = (new \App\Core\Model())->db->prepare($sql);

        $stmt->bindParam(":motorista_id", $motorista_id);
        $stmt->bindParam(":id", $pedido_id);

        $stmt->execute();

        echo json_encode([
            "success" => true,
            "message" => "Pedido aceite com sucesso"
        ]);
    }
}
