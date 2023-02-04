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

        $data["title"] = 'Dashboard';
        $data["totalCitas"] = $totalCitas;
        $data["totalPacientes"] = $totalPacientes;
        $data["totalConsultas"] = $totalConsultas;
        $data["totalMedicamentos"] = $totalMedicamentos;

        return view('dashboard', $data);
    }

}
