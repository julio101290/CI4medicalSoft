<?php
 namespace App\Controllers;
 use App\Controllers\BaseController;
 use \App\Models\{BitacoraModel};
 use CodeIgniter\API\ResponseTrait;

 class BitacoraController extends BaseController {
     use ResponseTrait;
     protected $log;
     protected $bitacora;
     public function __construct() {
         $this->bitacora = new BitacoraModel();
         helper('menu');
         helper('utilerias');
     }
     public function index() {



        helper('auth');

        $idUser = user()->id;




         if ($this->request->isAJAX()) {
            $datos = $this->bitacora->select("id"
                                            . ",descripcion"
                                            . ",usuario"
                                            . ",created_at"
                                            . ",updated_at"
                                            . ",deleted_at");
             
         
             return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
         }
         $titulos["title"] = lang('bitacora.title');
         $titulos["subtitle"] = lang('bitacora.subtitle');
         return view('bitacora', $titulos);
     }

     /**
      * Delete Bitacora
      * @param type $id
      * @return type
      */
     public function delete($id) {
         $infoBitacora = $this->bitacora->find($id);
         helper('auth');
         $userName = user()->username;
         if (!$found = $this->bitacora->delete($id)) {
             return $this->failNotFound(lang('bitacora.msg.msg_get_fail'));
         }
         $this->bitacora->purgeDeleted();

         return $this->respondDeleted($found, lang('bitacora.msg_delete'));
     }
 }
        