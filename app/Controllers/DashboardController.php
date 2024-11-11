<?php

namespace App\Controllers;

use \App\Models\PacientesModel;
use \App\Models\ConsultasModel;
use App\Models\CitasModel;
use App\Models\MedicamentosModel;

/**
 * Class DashboardController.
 */
class DashboardController extends BaseController {

    protected $pacientes;
    protected $consultas;
    protected $citas;
    protected $medicamentos;
    protected $usuarios;

    public function __construct() {
        $this->pacientes = new PacientesModel();
        $this->citas = new CitasModel();
        $this->consultas = new ConsultasModel();
        $this->medicamentos = new ConsultasModel();
        helper('menu');
        helper('utilerias');
    }

    public function index() {

        $totalConsultas = $this->consultas->select("*")->where("deleted_at", null)->countAllResults();
        $totalCitas = $this->citas->select("*")->where("deleted_at", null)->countAllResults();
        $totalPacientes = $this->pacientes->select("*")->where("deleted_at", null)->countAllResults();
        $totalMedicamentos = $this->medicamentos->select("*")->where("deleted_at", null)->countAllResults();
        
        
        $pacientesConsulta = $this->consultas->mdlTenPatientMoreFrequent();
        $diagnosticosConsulta = $this->consultas->mdlTenDiagnosesFrequent();
        
        
        

        $colors[1] = "#f56954";
        $colors[2] = "#00a65a";
        $colors[3] = "#f39c12";
        $colors[4] = "#00c0ef";
        $colors[5] = "#3c8dbc";
        $colors[6] = "#d2d6de";
        $colors[7] = "#009900";
        $colors[8] = "#86134d";
        $colors[9] = "#0033cc";
        $colors[10] = "#cc0000";
        
        $dataPatiens["name"] = "";
        $dataPatiens["amount"] = "";
        $dataPatiens["color"] = "";
        
        $dataDiagnoses["description"] = "";
        $dataDiagnoses["amount"] = "";
        $dataDiagnoses["color"] = "";

        $counter = 1;
        foreach ($pacientesConsulta as $key => $value) {

            $dataPatiens["name"] .= "'$value[nombre]',";
            $dataPatiens["amount"] .= "$value[total],";
            $dataPatiens["color"] .= "'$colors[$counter]',";
            
            $counter ++;

        }
        
        $dataPatiens["name"] = substr($dataPatiens["name"], 0, -1);
        $dataPatiens["amount"] = substr($dataPatiens["amount"], 0, -1);
        $dataPatiens["color"] = substr($dataPatiens["color"], 0, -1);
        
        
        $counter = 1;
        foreach ($diagnosticosConsulta as $key => $value) {

            $dataDiagnoses["description"] .= "'$value[descripcion]',";
            $dataDiagnoses["amount"] .= "$value[total],";
            $dataDiagnoses["color"] .= "'$colors[$counter]',";
            
            $counter ++;

        }

        $data["title"] = 'Dashboard';
        $data["totalCitas"] = $totalCitas;
        $data["totalPacientes"] = $totalPacientes;
        $data["totalConsultas"] = $totalConsultas;
        $data["totalMedicamentos"] = $totalMedicamentos;
        $data["dataPatiens"] = $dataPatiens;
        
        $data["dataDiagnoses"] = $dataDiagnoses;

        return view('dashboard', $data);
    }

}
