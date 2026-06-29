<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Entrega;

class EntregaController extends Controller
{
    // motorista confirma recolha
    public function recolher()
    {
        $entrega = new Entrega();

        $entrega->atualizarStatus($_POST['pedido_id'], "recolhido");

        echo json_encode([
            "success" => true,
            "message" => "Recolha confirmada"
        ]);
    }

    // motorista confirma entrega
    public function entregar()
    {
        $entrega = new Entrega();

        $entrega->atualizarStatus($_POST['pedido_id'], "entregue");

        echo json_encode([
            "success" => true,
            "message" => "Entrega concluída"
        ]);
    }

    // histórico do cliente
    public function historicoCliente()
    {
        $entrega = new Entrega();

        $data = $entrega->getHistoricoCliente($_GET['cliente_id']);

        echo json_encode($data);
    }
}
