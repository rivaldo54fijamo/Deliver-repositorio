<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Session;
use App\Core\CSRF;
use App\Helpers\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        $csrf = CSRF::generate();
        require "../app/Views/auth/login.php";
    }

    public function authenticate()
    {
        Session::start();

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $token = $_POST['csrf_token'] ?? '';

        // CSRF CHECK
        if (!CSRF::validate($token)) {
            die("Token CSRF inválido");
        }

        $userModel = new User();
        $user = $userModel->findByUsername($username);

        if (!$user) {
            die("Usuário não encontrado");
        }

        if ($user['status'] === 'bloqueado') {
            die("Usuário bloqueado");
        }

        if (!Hash::check($password, $user['password'])) {
            die("Senha incorreta");
        }

        Session::set("user_id", $user['id']);
        Session::set("role", $user['role']);
        Session::set("username", $user['username']);

        switch ($user['role']) {
            case 'super_admin':
            case 'admin':
                header("Location: " . BASE_URL . "/admin");
                break;

            case 'motorista':
                header("Location: " . BASE_URL . "/motorista");
                break;

            default:
                header("Location: " . BASE_URL . "/cliente");
                break;
        }
    }

    public function logout()
    {
        Session::start();
        session_destroy();

        header("Location: " . BASE_URL);
    }
}
