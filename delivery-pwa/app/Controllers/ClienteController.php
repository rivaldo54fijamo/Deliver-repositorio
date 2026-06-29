<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Middleware\RoleMiddleware;

class ClienteController extends Controller
{
    public function index()
    {
        RoleMiddleware::check(['cliente']);

        require "../app/Views/cliente/dashboard.php";
    }
}
