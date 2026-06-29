<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Models\Motorista;

class MotoristaController extends Controller
{
    public function index()
    {
        Session::start();

        require "../app/Views/motorista/dashboard.php";
    }

    public function setOnline()
    {
        Session::start();

        $motorista = new Motorista();

        $motorista->setStatus(Session::get("user_id"), 1);

        echo json_encode(["status" => "online"]);
    }

    public function setOffline()
    {
        Session::start();

        $motorista = new Motorista();

        $motorista->setStatus(Session::get("user_id"), 0);

        echo json_encode(["status" => "offline"]);
    }
}
