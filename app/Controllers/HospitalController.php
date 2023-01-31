<?php

namespace agungsugiarto\boilerplate\Controllers\Users;
namespace App\Controllers;


use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;
use App\Models\ConfiguracionesModel;
use App\Models\BitacoraModel;
use agungsugiarto\boilerplate\Controllers\BaseController;
use agungsugiarto\boilerplate\Entities\Collection;
use agungsugiarto\boilerplate\Models\GroupModel;

use CodeIgniter\Config\Services;

/**
 * Class UserController.
 */
class HospitalController extends BaseController
{
    use ResponseTrait;
   /** @var \agungsugiarto\boilerplate\Models\GroupModel */
    protected $group;
    protected $configuraciones;
    protected $bitacora;

    /** @var \agungsugiarto\boilerplate\Models\UserModel */
    protected $users;

    public function __construct()
    {
        $this->group = new GroupModel();
        $this->configuraciones = new ConfiguracionesModel();
        $this->bitacora = new BitacoraModel();
        $autorize = $this->authorize = Services::authorization();
        helper('menu');
    }

    public function index()
    {
    
      

        
        $datos = $this->configuraciones->where("id",1)->first();
        
       
        $data["title"] = lang('settings.settings.title');
        $data["subtitle"] = lang('settings.settings.title');
        $data["data"] = $datos;

        return view('configuraciones',$data);

      
    }


    public function guardar()
    {
        
     
        helper('auth');
        $userName = user()->username ;
        $idUser  = user()->id ;
        
        
        
     
    
        
        $bitacoraDatos["descripcion"] = "Se Modifico las configuracion con los siguientes datos:". json_encode($_POST);
        $bitacoraDatos["usuario"] = $userName;
        
        
        //GUARDA CONFIGURACIONES
        $this->configuraciones->update(1,$_POST);
      
        //GUARDAR EN BITACORA
       $this->bitacora->save($bitacoraDatos);
        //  return redirect()->to("/admin/hospital");
       return redirect()->back()->with('sweet-success', 'Actualizado Correctamente');
         // return redirect()->back()->with('sweet-success','Guardado Correctamente');

          }
         
}