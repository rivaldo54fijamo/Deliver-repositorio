<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Tracking;

class TrackingController extends Controller
{
    public function update()
    {
        Session::start();

        $motorista_id = Session::get("user_id");

        $tracking = new Tracking();

        $tracking->updateLocation(
            $motorista_id,
            $_POST['pedido_id'],
            $_POST['lat'],
            $_POST['lng']
        );

        echo json_encode([
            "success" => true,
            "message" => "Localização atualizada"
        ]);
    }

    public function get()
    {
        $tracking = new Tracking();

        $data = $tracking->getLatest($_GET['pedido_id']);

        echo json_encode($data);
    }
}
