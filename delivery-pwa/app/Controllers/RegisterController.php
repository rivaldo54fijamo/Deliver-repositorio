<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Hash;
use App\Models\User;
use App\Helpers\Validator;

class RegisterController extends Controller
{
    // ======================
    // CADASTRO CLIENTE
    // ======================
    public function cliente()
    {
        require "../app/Views/auth/register.php";
    }

    public function storeCliente()
    {
        $data = $_POST;

        if (
            !Validator::required($data['nome']) ||
            !Validator::required($data['telefone']) ||
            !Validator::required($data['password'])
        ) {
            die("Campos obrigatórios em falta");
        }

        if (!Validator::match($data['password'], $data['confirm_password'])) {
            die("Senhas não coincidem");
        }

        $user = new User();

        $user->create([
            "username" => null,
            "nome" => $data['nome'],
            "apelido" => $data['apelido'],
            "bi" => $data['bi'],
            "telefone" => $data['telefone'],
            "morada" => $data['morada'],
            "ano_nascimento" => $data['ano_nascimento'],
            "email" => $data['email'],
            "password" => Hash::make($data['password']),
            "role" => "cliente"
        ]);

        header("Location: " . BASE_URL);
    }

    // ======================
    // CADASTRO MOTORISTA
    // ======================
    public function motorista()
    {
        require "../app/Views/auth/register_motorista.php";
    }

    public function storeMotorista()
    {
        $data = $_POST;

        $user = new User();

        $user->create([
            "username" => $data['username'],
            "nome" => $data['nome'],
            "apelido" => $data['apelido'],
            "bi" => $data['bi'],
            "telefone" => $data['telefone'],
            "morada" => $data['morada'],
            "ano_nascimento" => $data['ano_nascimento'],
            "email" => $data['email'],
            "password" => Hash::make($data['password']),
            "role" => "motorista"
        ]);

        header("Location: " . BASE_URL . "/admin");
    }

    // ======================
    // CADASTRO ADMIN
    // ======================
    public function admin()
    {
        require "../app/Views/auth/register_admin.php";
    }

    public function storeAdmin()
    {
        $data = $_POST;

        $user = new User();

        $user->create([
            "username" => $data['username'],
            "nome" => $data['nome'],
            "apelido" => $data['apelido'],
            "bi" => $data['bi'],
            "telefone" => $data['telefone'],
            "morada" => $data['morada'],
            "ano_nascimento" => $data['ano_nascimento'],
            "email" => $data['email'],
            "password" => Hash::make($data['password']),
            "role" => "admin"
        ]);

        header("Location: " . BASE_URL . "/admin");
    }
}
