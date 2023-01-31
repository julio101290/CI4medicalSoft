<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\PacientesModel;
use \App\Models\BitacoraModel;
use CodeIgniter\API\ResponseTrait;

class PacientesController extends BaseController {

    use ResponseTrait;

    protected $bitacora;
    protected $pacientes;

    public function __construct() {
        $this->pacientes = new PacientesModel();
        $this->bitacora = new BitacoraModel();
        helper('menu');
    }

    public function index() {


        if ($this->request->isAJAX()) {

            /*
              $start = $this->request->getGet('start');
              $length = $this->request->getGet('length');
              $search = $this->request->getGet('search[value]');
              $order = BitacoraModel::ORDERABLE[$this->request->getGet('order[0][column]')];
              $dir = $this->request->getGet('order[0][dir]');
             */

            $datos = $this->pacientes->select('id,nombres,apellidos,dni,telefono,correoElectronico,created_at,updated_at')->where('deleted_at', null);
// $resultado = $this->bitacora->findAll();
// $this->bitacora->getResource()->countAllResults(),
// $this->bitacora->getResource($search)->countAllResults()
//      var_dump($datos);


            return \Hermawan\DataTables\DataTable::of($datos)->add('action', function ($row) {
                                return " <div class=\"btn-group\">
                          
                  <button class=\"btn btn-warning btnEditarPaciente\" data-toggle=\"modal\" idPaciente=\"$row->id\" data-target=\"#modalAgregarPaciente\">  <i class=\" fa fa-edit \"></i></button>
                  <button class=\"btn btn-danger btnEliminarPaciente\" idPaciente=\"$row->id\"><i class=\"fa fa-times\"></i></button></div>";
                            }, 'last')
                            ->toJson();
        }

        $titulos["title"] = lang('patients.title');
        $titulos["subtitle"] = lang('patients.subtitle');

//$data["data"] = $datos;
        return view('pacientes', $titulos);
    }

    /*
     * Lee paciente
     */

    public function traePaciente() {


        $idPaciente = $this->request->getPost("idPaciente");
        $datosPaciente = $this->pacientes->find($idPaciente);

        echo json_encode($datosPaciente);
    }

    /*
     * Guarda o actualiza paciente
     */

    public function guardar() {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $datos = $this->request->getPost();

        if ($datos["idPaciente"] == 0) {


            try {


                if ($this->pacientes->save($datos) === false) {

                    $errores = $this->pacientes->errors();

                    foreach ($errores as $field => $error) {

                        echo $error . " ";
                    }

                    return;
                }

                $datosBitacora["descripcion"] = "Se guardo el paciente con los siguientes datos: " . json_encode($datos);
                $datosBitacora["usuario"] = $userName;

                $this->bitacora->save($datosBitacora);

                echo "Guardado Correctamente";
            } catch (\PHPUnit\Framework\Exception $ex) {


                echo "Error al guardar " . $ex->getMessage();
            }
        } else {


            if ($this->pacientes->update($datos["idPaciente"], $datos) == false) {

                $errores = $this->pacientes->errors();
                foreach ($errores as $field => $error) {

                    echo $error . " ";
                }

                return;
            } else {

                $datosBitacora["descripcion"] = "Se actualizo el paciente con los siguientes datos: " . json_encode($datos);
                $datosBitacora["usuario"] = $userName;
                $this->bitacora->save($datosBitacora);
                echo "Actualizado Correctamente";

                return;
            }
        }

        return;
    }

    public function delete($id) {

        $infoPaciente = $this->pacientes->find($id);
        helper('auth');
        $userName = user()->username;

        if (!$found = $this->pacientes->delete($id)) {
            return $this->failNotFound(lang('patients.msg.msg_get_fail'));
        }



        $datosBitacora["descripcion"] = "Se elimino el paciente que contenia los siguientes datos " . json_encode($infoPaciente);
        $datosBitacora["usuario"] = $userName;

        $this->bitacora->save($datosBitacora);
        return $this->respondDeleted($found, lang('patients.msg.msg_delete'));
    }

    /**
     * Trae en formato JSON los pacientes para el select2
     * @return type
     */
    public function traerPacientesAjax() {

        $request = service('request');
        $postData = $request->getPost();

        $response = array();

        // Read new token and assign in $response['token']
        $response['token'] = csrf_hash();

        if (!isset($postData['searchTerm'])) {
            // Fetch record
            $pacientes = new PacientesModel();
            $listaPacientes = $pacientes->select('id,nombres,apellidos')
                    ->orderBy('nombres')
                    ->findAll(10);
        } else {
            $searchTerm = $postData['searchTerm'];

            // Fetch record
            $pacientes = new PacientesModel();
            $listaPacientes = $pacientes->select('id,nombres,apellidos')
                    ->where("deleted_at", null)
                    ->like('nombres', $searchTerm)
                    ->orLike('apellidos', $searchTerm)
                    ->orderBy('nombres')
                    ->findAll(10);
        }

        $data = array();
        foreach ($listaPacientes as $paciente) {
            $data[] = array(
                "id" => $paciente['id'],
                "text" => $paciente['nombres'] . ' ' . $paciente['apellidos'],
            );
        }

        $response['data'] = $data;

        return $this->response->setJSON($response);
    }

}
