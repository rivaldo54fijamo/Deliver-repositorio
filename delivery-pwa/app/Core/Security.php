<?php

namespace App\Core;

class Security
{
    public static function clean($data)
    {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    public static function startSecureSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();

            session_regenerate_id(true);
        }
    }
}
