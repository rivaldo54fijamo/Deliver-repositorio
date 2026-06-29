<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Pedido;

class PedidoController extends Controller
{
    public function store()
    {
        Session::start();

        $pedido = new Pedido();

        $data = [
            "cliente_id" => Session::get("user_id"),
            "origem_lat" => $_POST['origem_lat'],
            "origem_lng" => $_POST['origem_lng'],
            "destino_lat" => $_POST['destino_lat'],
            "destino_lng" => $_POST['destino_lng'],
            "distancia_km" => $_POST['distancia'],
            "valor" => $_POST['valor'],
            "status" => "aguardando_motorista",
            "telefone_receptor" => $_POST['telefone']
        ];

        $pedido->create($data);

        echo json_encode([
            "success" => true,
            "message" => "Pedido criado com sucesso"
        ]);
    }

    public function meusPedidos()
    {
        Session::start();

        $pedido = new Pedido();

        $data = $pedido->getByClient(Session::get("user_id"));

        echo json_encode($data);
    }

    public function cancelar()
    {
        $pedido = new Pedido();

        $id = $_POST['id'];

        $pedido->cancel($id);

        echo json_encode([
            "success" => true,
            "message" => "Pedido cancelado"
        ]);
    }
}
