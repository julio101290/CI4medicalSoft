<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Controllers;

/**
 * Description of PDFLayout
 *
 * @author hp
 */
class PDFLayout extends \TCPDF {

    public $nombreEmpresa = "";
    public $direccion = "";
    public $doctor = "";

    public function __construct() {
        parent::__construct();
    }

    public function Header() {
        // Logo
        $image_file =  'logo.png';
        $this->Image($image_file, 10, 10, 15, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('dejavusans', 'B', 16);
        // Title
        $this->Cell(0, 15, $this->nombreEmpresa, 0, false, 'C', 0, '', 0, false, 'M', 'M');
        
        $this->SetFont('dejavusans','' , 13);
        $this->SetY(16);
        $this->Cell(0, 15, $this->direccion, 0, false, 'C', 0, '', 0, false, 'M', 'M');
        
        $this->SetFont('dejavusans','' , 13);
        $this->SetY(21);
        $this->Cell(0, 15, $this->doctor, 0, false, 'C', 0, '', 0, false, 'M', 'M');
        
        $this->SetY(30);
        $this->writeHTML("<hr>", true, false, false, false, '');
        
        $this->SetY(35);
        
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, lang('consultas.pagina'). " " . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

}
