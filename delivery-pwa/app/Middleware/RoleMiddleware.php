<?php

namespace App\Middleware;

use App\Core\Session;

class RoleMiddleware
{
    public static function check($roles = [])
    {
        Session::start();

        if (!Session::has("user_id")) {
            header("Location: " . BASE_URL);
            exit;
        }

        $userRole = Session::get("role");

        if (!in_array($userRole, $roles)) {
            echo "<h3>Acesso negado</h3>";
            exit;
        }
    }
}
