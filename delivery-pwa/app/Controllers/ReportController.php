<?php

namespace App\Controllers;

use App\Models\Admin;

class ReportController
{
    public function stats()
    {
        $admin = new Admin();

        echo json_encode($admin->getStats());
    }
}
