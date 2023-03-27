<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MedicamentosModel;
use \App\Models\BitacoraModel;
use CodeIgniter\API\ResponseTrait;

class MedicamentosController extends BaseController {

    use ResponseTrait;

    protected $bitacora;
    protected $medicamentos;

    public function __construct() {
        $this->medicamentos = new MedicamentosModel();
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

            $datos = $this->medicamentos->select('id,descripcion,created_at,updated_at')->where('deleted_at', null);
            // $resultado = $this->bitacora->findAll();
            // $this->bitacora->getResource()->countAllResults(),
            // $this->bitacora->getResource($search)->countAllResults()
            //      var_dump($datos);


            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }

        $titulos["title"] = lang('medicamentos.title');
        $titulos["subtitle"] = lang('medicamentos.subtitle');

        return view('medicamentos', $titulos);
    }

    /**
     * Tratamientos Tabla Consultas
     */
    public function traeMedicamentoTabla() {

        $datos = $this->medicamentos->select("id, descripcion")->where("deleted_at", null);

        return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
    }

    /*
     * Lee paciente
     */

    public function traeMedicamento() {


        $idMedicamento = $this->request->getPost("idMedicamento");
        $datosMedicamento = $this->medicamentos->find($idMedicamento);

        echo json_encode($datosMedicamento);
    }

    /*
     * Guarda o actualiza paciente
     */

    public function guardar() {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $datos = $this->request->getPost();

        if ($datos["idMedicamento"] == 0) {


            try {


                if ($this->medicamentos->save($datos) === false) {

                    $errores = $this->medicamentos->errors();

                    foreach ($errores as $field => $error) {

                        echo $error . " ";
                    }

                    return;
                }

                $datosBitacora["descripcion"] = "Se guardo la medicamento con los siguientes datos: " . json_encode($datos);
                $datosBitacora["usuario"] = $userName;

                $this->bitacora->save($datosBitacora);

                echo "Guardado Correctamente";
            } catch (\PHPUnit\Framework\Exception $ex) {


                echo "Error al guardar " . $ex->getMessage();
            }
        } else {


            if ($this->medicamentos->update($datos["idMedicamento"], $datos) == false) {

                $errores = $this->medicamentos->errors();
                foreach ($errores as $field => $error) {

                    echo $error . " ";
                }

                return;
            } else {

                $datosBitacora["descripcion"] = "Se actualizo el medicamento con los siguientes datos: " . json_encode($datos);
                $datosBitacora["usuario"] = $userName;
                $this->bitacora->save($datosBitacora);
                echo "Actualizado Correctamente";

                return;
            }
        }

        return;
    }

    public function delete($id) {
        $infoMedicamento = $this->medicamentos->find($id);
        helper('auth');
        $userName = user()->username;

        if (!$found = $this->medicamentos->delete($id)) {
            return $this->failNotFound(lang('medicamentos.msg.msg_get_fail'));
        }



        $datosBitacora["descripcion"] = "Se elimino la medicamento que contenia los siguientes datos " . json_encode($infoMedicamento);
        $datosBitacora["usuario"] = $userName;

        $this->bitacora->save($datosBitacora);
        return $this->respondDeleted($found, lang('medicamentos.msg.msg_delete'));
    }

}
