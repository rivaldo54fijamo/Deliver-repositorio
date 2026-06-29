<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Middleware\RoleMiddleware;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        RoleMiddleware::check(['admin', 'super_admin']);

        $admin = new Admin();
        $stats = $admin->getStats();

        require "../app/Views/admin/dashboard.php";
    }

    public function users()
    {
        RoleMiddleware::check(['admin', 'super_admin']);

        $admin = new Admin();
        $users = $admin->getUsers();

        require "../app/Views/admin/users.php";
    }

    public function block()
    {
        RoleMiddleware::check(['admin', 'super_admin']);

        $admin = new Admin();
        $admin->blockUser($_POST['id']);

        echo json_encode(["success" => true]);
    }

    public function unblock()
    {
        RoleMiddleware::check(['admin', 'super_admin']);

        $admin = new Admin();
        $admin->unblockUser($_POST['id']);

        echo json_encode(["success" => true]);
    }
}
