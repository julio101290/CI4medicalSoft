<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\BitacoraModel;
use CodeIgniter\API\ResponseTrait;

class BitacoraController extends BaseController {

    use ResponseTrait;

    protected $bitacora;

    public function __construct() {
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

           $datos = $this->bitacora->select('id,descripcion,usuario,created_at');
           // $resultado = $this->bitacora->findAll();
                                   // $this->bitacora->getResource()->countAllResults(),
                                   // $this->bitacora->getResource($search)->countAllResults()
           return \Hermawan\DataTables\DataTable::of($datos)->toJson();
        }
        
        $titulos["title"] = lang('log.title');
        $titulos["subtitle"] = lang('log.subtitle');
        //$data["data"] = $datos;
        return view('bitacora',$titulos);
    }

    public function tabla() {


        if ($this->request->isAJAX()) {
            $start = $this->request->getGet('start');
            $length = $this->request->getGet('length');
            $search = $this->request->getGet('search[value]');
            $order = BitacoraModel::ORDERABLE[$this->request->getGet('order[0][column]')];
            $dir = $this->request->getGet('order[0][dir]');

            return $this->respond(Collection::datatable(
                                    $this->bitacora->getResource($search)->orderBy($order, $dir)->limit($length, $start)->get()->getResultObject(),
                                    $this->bitacora->getResource()->countAllResults(),
                                    $this->bitacora->getResource($search)->countAllResults()
            ));
        }
    }

}