<?php

namespace App\Core;

class Controller
{
    public function model($model)
    {
        $class = "\\App\\Models\\" . $model;
        return new $class;
    }

    public function view($view, $data = [])
    {
        require "../app/Views/" . $view . ".php";
    }
}
