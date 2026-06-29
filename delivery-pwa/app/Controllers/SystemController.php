<?php

namespace App\Controllers;

use App\Models\Admin;

class SystemController
{
    public function exportPDF()
    {
        require_once "../vendor/fpdf.php";

        $admin = new Admin();
        $stats = $admin->getStats();

        $pdf = new \FPDF();
        $pdf->AddPage();

        $pdf->SetFont("Arial", "B", 16);
        $pdf->Cell(40, 10, "Relatorio Delivery PWA");

        $pdf->Ln();

        foreach ($stats as $key => $value) {
            $pdf->Cell(40, 10, ucfirst($key) . ": " . $value);
            $pdf->Ln();
        }

        $pdf->Output();
    }


    public function exportExcel()
    {
        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=relatorio.csv");

        $admin = new \App\Models\Admin();
        $stats = $admin->getStats();

        $output = fopen("php://output", "w");

        fputcsv($output, ["Tipo", "Quantidade"]);

        foreach ($stats as $key => $value) {
            fputcsv($output, [$key, $value]);
        }

        fclose($output);
    }


    public function toggleSystem()
    {
        $status = $_POST['status']; // online/offline

        $sql = "UPDATE configuracoes SET valor = :valor WHERE chave = 'sistema_status'";
        $stmt = (new \App\Core\Model())->db->prepare($sql);

        $stmt->execute([
            "valor" => $status
        ]);

        echo json_encode(["success" => true]);
    }
}
