<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EnfermedadesModel;
use \App\Models\BitacoraModel;
use CodeIgniter\API\ResponseTrait;

class EnfermedadesController extends BaseController {

    use ResponseTrait;

    protected $bitacora;
    protected $enfermedades;

    public function __construct() {
        $this->enfermedades = new EnfermedadesModel();
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

            $datos = $this->enfermedades->select('id,descripcion,created_at,updated_at')->where('deleted_at', null);
            // $resultado = $this->bitacora->findAll();
            // $this->bitacora->getResource()->countAllResults(),
            // $this->bitacora->getResource($search)->countAllResults()
            //      var_dump($datos);

            $dataTable =  \Hermawan\DataTables\DataTable::of($datos);
            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
        }

        $titulos["title"] = lang('enfermedades.title');
        $titulos["subtitle"] = lang('enfermedades.subtitle');

        return view('enfermedades', $titulos);
    }
    
    /**
     * Lee tabla enfermedades / Diagnostico para ponerlo en la tabla al generar la consulta
     */
    
    public function traeEnfermedadesTablaConsultas(){
        
        if ($this->request->isAJAX()) {
            
            
             $datos = $this->enfermedades->select('id,descripcion')->where('deleted_at', null);
             
             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
              
            
        }
        
    }

    /*
     * Lee paciente
     */

    public function traeEnfermedad() {


        $idEnfermedad = $this->request->getPost("idEnfermedad");
        $datosEnfermedad = $this->enfermedades->find($idEnfermedad);

        echo json_encode($datosEnfermedad);
    }

    /*
     * Guarda o actualiza paciente
     */

    public function guardar() {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $datos = $this->request->getPost();

        if ($datos["idEnfermedad"] == 0) {


            try {


                if ($this->enfermedades->save($datos) === false) {

                    $errores = $this->enfermedades->errors();

                    foreach ($errores as $field => $error) {

                        echo $error . " ";
                    }

                    return;
                }

                $datosBitacora["descripcion"] = "Se guardo la enfermedad con los siguientes datos: " . json_encode($datos);
                $datosBitacora["usuario"] = $userName;

                $this->bitacora->save($datosBitacora);

                echo "Guardado Correctamente";
            } catch (\PHPUnit\Framework\Exception $ex) {


                echo "Error al guardar " . $ex->getMessage();
            }
        } else {


            if ($this->enfermedades->update($datos["idEnfermedad"], $datos) == false) {
                
                $errores = $this->enfermedades->errors();
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
    
    
    
     public function delete($id)
    {
         
        helper('auth');
        $userName = user()->username;
       
        $infoEnfermedad = $this->enfermedades->find($id); 
        if (!$found = $this->enfermedades->delete($id)) {
            return $this->failNotFound(lang('enfermedades.msg.msg_get_fail'));
        }
        
        
        
        
        
        $datosBitacora["descripcion"] = "Se elimino la enfermedad que contenia los siguientes datos ". json_encode($infoEnfermedad);
        $datosBitacora["usuario"] = $userName;
        
        $this->bitacora->save($datosBitacora);
        return $this->respondDeleted($found, lang('enfermedades.msg.msg_delete'));
    }

}