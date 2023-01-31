<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CitasModel;
use \App\Models\BitacoraModel;
use CodeIgniter\API\ResponseTrait;

class CitasController extends BaseController {

    use ResponseTrait;

    protected $bitacora;
    protected $citas;

    public function __construct() {
        $this->citas = new CitasModel();
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

            $datos = $this->citas->mdlObtenerDatos();  
                    //where('deleted_at', null);
            // $resultado = $this->bitacora->findAll();
            // $this->bitacora->getResource()->countAllResults(),
            // $this->bitacora->getResource($search)->countAllResults()
            //      var_dump($datos);


            return \Hermawan\DataTables\DataTable::of($datos)->add('action', function ($row) {
                                return " <div class=\"btn-group\">
                          
                  <button class=\"btn btn-warning btnEditarCita\" data-toggle=\"modal\" idCita=\"$row->id\" data-target=\"#modalAgregarCitas\">  <i class=\" fa fa-edit \"></i></button>
                  <button class=\"btn btn-danger btnEliminarCita\" idCita=\"$row->id\"><i class=\"fa fa-times\"></i></button></div>";
                            }, 'last')
                            ->toJson();
        }

        
        $fechaActual =  fechaMySQLADateTimeHTML5(fechaHoraActual());
        
        $hastaFecha = fechaMySQLADateTimeHTML5( agregarMinutos(fechaHoraActual(),30));
        
        $titulos["fecha"] =  $fechaActual;
        $titulos["hastaFecha"] =  $hastaFecha;
        $titulos["title"] = lang('citas.title');
        $titulos["subtitle"] = lang('citas.subtitle');

        return view('citas', $titulos);
    }

    /*
     * Lee paciente
     */

    public function traeCita() {


        $idCita = $this->request->getPost("idCita");
        $datosCita = $this->citas->mdlObtenerCita($idCita);

        echo json_encode($datosCita);
    }

    /*
     * Guarda o actualiza paciente
     */

    public function guardar() {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $datos = $this->request->getPost();

        if ($datos["idCita"] == 0) {


            try {


                if ($this->citas->save($datos) === false) {

                    $errores = $this->citas->errors();

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


            if ($this->citas->update($datos["idCita"], $datos) == false) {
                
                $errores = $this->citas->errors();
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
    
    
    
     public function delete($id)
    {
        if (!$found = $this->citas->delete($id)) {
            return $this->failNotFound(lang('citas.msg.msg_get_fail'));
        }
        
        $infoCita = $this->citas->find($id);
        
        $datosBitacora["descripcion"] = "Se elimino la medicamento que contenia los siguientes datos ". json_encode($infoCita);
        
        $this->bitacora->save($datosBitacora);
        return $this->respondDeleted($found, lang('citas.msg.msg_delete'));
    }

}