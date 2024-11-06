<?php

namespace agungsugiarto\boilerplate\Controllers\Users;

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;
use App\Models\ConfiguracionesModel;
use App\Models\BitacoraModel;
use julio101290\boilerplate\Controllers\BaseController;
use julio101290\boilerplate\Entities\Collection;
use julio101290\boilerplate\Models\GroupModel;
use CodeIgniter\Config\Services;

/**
 * Class UserController.
 */
class HospitalController extends BaseController {

    use ResponseTrait;

    /** @var \agungsugiarto\boilerplate\Models\GroupModel */
    protected $group;
    protected $configuraciones;
    protected $bitacora;

    /** @var \agungsugiarto\boilerplate\Models\UserModel */
    protected $users;

    public function __construct() {
        $this->group = new GroupModel();
        $this->configuraciones = new ConfiguracionesModel();
        $this->bitacora = new BitacoraModel();
        $autorize = $this->authorize = Services::authorization();
        helper('menu');
    }

    public function index() {




        $datos = $this->configuraciones->where("id", 1)->first();

        $data["title"] = lang('settings.settings.title');
        $data["subtitle"] = lang('settings.settings.title');
        $data["data"] = $datos;

        return view('configuraciones', $data);
    }

    public function guardar() {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $bitacoraDatos["descripcion"] = "Se Modifico las configuracion con los siguientes datos:" . json_encode($_POST);
        $bitacoraDatos["usuario"] = $userName;

        //GUARDA CONFIGURACIONES
        $this->configuraciones->update(1, $_POST);

        $session = \Config\Services::session();
        $language = \Config\Services::language();
        $locale = $this->request->getLocale();

        $str = file_get_contents(ROOTPATH . "app/Config/App.php");
        
        $languajeNew = "English";
        switch ($_POST["languaje"]) {
            case "en":
                $languajeNew = "en";
                break;
            case "es":
                $languajeNew = "es";
                break;
            case "eo":
                $languajeNew = "eo";
                break;
            case "de":
                $languajeNew = "de";
        }

        //replace something in the file string - this is a VERY simple example
        $str = str_replace("public string \$defaultLocale = '$locale';", "public string \$defaultLocale = '$languajeNew';", $str);

        //write the entire string
        file_put_contents(ROOTPATH . "app/Config/App.php", $str);

        $session->set('language', $_POST["languaje"]);
        $language->setLocale($session->language);

        $i18n = Config('Boilerplate')->i18n;

        $boilerplate = file_get_contents(ROOTPATH . "app/Config/Boilerplate.php");

        $newi18n = 'English';
        switch ($_POST["languaje"]) {
            case "en":
                $newi18n = "English";
                break;
            case "es":
                $newi18n = "Spanish";
                break;
            case "eo":
                $newi18n = "Esperanto";
                break;
            case "de":
                $newi18n = "German";
        }

        $boilerplate = str_replace("public \$i18n = '$i18n';", "public \$i18n = '$newi18n';", $boilerplate);

        //write the entire string
        file_put_contents(ROOTPATH . "app/Config/Boilerplate.php", $boilerplate);

        $menu = array(
            array('id' => '1', 'parent_id' => '0', 'active' => '1', 'title' => lang('menu.dashboard'), 'icon' => 'fas fa-tachometer-alt', 'route' => 'admin', 'sequence' => '1', 'created_at' => '2022-12-20 22:39:17', 'updated_at' => '2022-12-20 23:09:10'),
            array('id' => '2', 'parent_id' => '0', 'active' => '1', 'title' => lang('menu.settings'), 'icon' => 'fas fa-share-alt', 'route' => '#', 'sequence' => '11', 'created_at' => '2022-12-20 22:39:17', 'updated_at' => '2022-12-20 23:09:10'),
            array('id' => '3', 'parent_id' => '2', 'active' => '1', 'title' => lang('menu.perfilUser'), 'icon' => 'fas fa-user-edit', 'route' => 'admin/user/profile', 'sequence' => '12', 'created_at' => '2022-12-20 22:39:17', 'updated_at' => '2022-12-20 23:09:10'),
            array('id' => '4', 'parent_id' => '2', 'active' => '1', 'title' => lang('menu.users'), 'icon' => 'fas fa-users', 'route' => 'admin/user/manage', 'sequence' => '13', 'created_at' => '2022-12-20 22:39:17', 'updated_at' => '2022-12-20 23:09:10'),
            array('id' => '5', 'parent_id' => '2', 'active' => '1', 'title' => lang('menu.permissions'), 'icon' => 'fas fa-user-lock', 'route' => 'admin/permission', 'sequence' => '14', 'created_at' => '2022-12-20 22:39:17', 'updated_at' => '2022-12-20 23:09:10'),
            array('id' => '6', 'parent_id' => '2', 'active' => '1', 'title' => lang('menu.roles'), 'icon' => 'fas fa-users-cog', 'route' => 'admin/role', 'sequence' => '15', 'created_at' => '2022-12-20 22:39:17', 'updated_at' => '2022-12-20 23:09:10'),
            array('id' => '7', 'parent_id' => '2', 'active' => '1', 'title' => lang('menu.menu'), 'icon' => 'fas fa-stream', 'route' => 'admin/menu', 'sequence' => '16', 'created_at' => '2022-12-20 22:39:17', 'updated_at' => '2022-12-20 23:09:10'),
            array('id' => '8', 'parent_id' => '2', 'active' => '1', 'title' => lang('menu.hospitalData'), 'icon' => 'fas fa-h-square', 'route' => 'admin/settings', 'sequence' => '17', 'created_at' => '2022-12-20 22:48:13', 'updated_at' => '2022-12-20 23:10:56'),
            array('id' => '9', 'parent_id' => '0', 'active' => '1', 'title' => lang('menu.catalogs'), 'icon' => 'fas fa-address-book', 'route' => 'admin/catalogos', 'sequence' => '7', 'created_at' => '2022-12-20 22:53:34', 'updated_at' => '2022-12-20 23:09:10'),
            array('id' => '10', 'parent_id' => '9', 'active' => '1', 'title' => lang('menu.patiens'), 'icon' => 'fas fa-male', 'route' => 'admin/pacientes', 'sequence' => '8', 'created_at' => '2022-12-20 22:54:33', 'updated_at' => '2022-12-20 23:09:10'),
            array('id' => '11', 'parent_id' => '9', 'active' => '1', 'title' => lang('menu.medications'), 'icon' => 'fas fa-briefcase-medical', 'route' => 'admin/medicamentos', 'sequence' => '9', 'created_at' => '2022-12-20 22:55:28', 'updated_at' => '2022-12-20 23:09:10'),
            array('id' => '12', 'parent_id' => '9', 'active' => '1', 'title' => lang('menu.diagnoses'), 'icon' => 'fas fa-file-medical-alt', 'route' => 'admin/enfermedades', 'sequence' => '10', 'created_at' => '2022-12-20 22:56:37', 'updated_at' => '2023-01-07 22:06:07'),
            array('id' => '13', 'parent_id' => '0', 'active' => '1', 'title' => lang('menu.operations'), 'icon' => 'fas fa-hiking', 'route' => '#', 'sequence' => '2', 'created_at' => '2022-12-20 23:04:42', 'updated_at' => '2022-12-20 23:09:10'),
            array('id' => '14', 'parent_id' => '13', 'active' => '1', 'title' => lang('menu.medicalAppointments'), 'icon' => 'fas fa-calendar-alt', 'route' => 'admin/citas', 'sequence' => '3', 'created_at' => '2022-12-20 23:05:35', 'updated_at' => '2023-01-08 17:28:58'),
            array('id' => '16', 'parent_id' => '13', 'active' => '1', 'title' => lang('menu.medicalConsultation'), 'icon' => 'fas fa-user-md', 'route' => 'admin/consultas/generarConsulta', 'sequence' => '5', 'created_at' => '2022-12-20 23:07:22', 'updated_at' => '2023-01-30 21:11:15'),
            array('id' => '17', 'parent_id' => '13', 'active' => '1', 'title' => lang('menu.listMedicalConsultations'), 'icon' => 'fas fa-list', 'route' => 'admin/consultas/listaConsultas', 'sequence' => '6', 'created_at' => '2022-12-20 23:08:01', 'updated_at' => '2023-02-02 22:07:21'),
            array('id' => '18', 'parent_id' => '2', 'active' => '1', 'title' => lang('menu.log'), 'icon' => 'fas fa-align-justify', 'route' => 'admin/bitacora', 'sequence' => '18', 'created_at' => '2022-12-20 23:09:46', 'updated_at' => '2022-12-20 23:09:46'),
        );

        foreach ($menu as $key => $value) {
            $this->db->table('menu')->replace($value);
        }


        $groups_menu = array(
            array('id' => '6', 'group_id' => '1', 'menu_id' => '6'),
            array('id' => '11', 'group_id' => '1', 'menu_id' => '1'),
            array('id' => '12', 'group_id' => '2', 'menu_id' => '1'),
            array('id' => '13', 'group_id' => '1', 'menu_id' => '3'),
            array('id' => '14', 'group_id' => '2', 'menu_id' => '3'),
            array('id' => '15', 'group_id' => '1', 'menu_id' => '4'),
            array('id' => '16', 'group_id' => '1', 'menu_id' => '5'),
            array('id' => '17', 'group_id' => '1', 'menu_id' => '7'),
            array('id' => '21', 'group_id' => '1', 'menu_id' => '2'),
            array('id' => '22', 'group_id' => '2', 'menu_id' => '2'),
            array('id' => '24', 'group_id' => '1', 'menu_id' => '9'),
            array('id' => '25', 'group_id' => '2', 'menu_id' => '9'),
            array('id' => '26', 'group_id' => '1', 'menu_id' => '10'),
            array('id' => '27', 'group_id' => '2', 'menu_id' => '10'),
            array('id' => '28', 'group_id' => '1', 'menu_id' => '11'),
            array('id' => '29', 'group_id' => '2', 'menu_id' => '11'),
            array('id' => '32', 'group_id' => '1', 'menu_id' => '13'),
            array('id' => '33', 'group_id' => '2', 'menu_id' => '13'),
            array('id' => '42', 'group_id' => '1', 'menu_id' => '18'),
            array('id' => '43', 'group_id' => '2', 'menu_id' => '18'),
            array('id' => '44', 'group_id' => '1', 'menu_id' => '8'),
            array('id' => '45', 'group_id' => '1', 'menu_id' => '12'),
            array('id' => '46', 'group_id' => '2', 'menu_id' => '12'),
            array('id' => '47', 'group_id' => '1', 'menu_id' => '14'),
            array('id' => '48', 'group_id' => '2', 'menu_id' => '14'),
            array('id' => '51', 'group_id' => '1', 'menu_id' => '16'),
            array('id' => '52', 'group_id' => '2', 'menu_id' => '16'),
            array('id' => '53', 'group_id' => '1', 'menu_id' => '1'),
            array('id' => '54', 'group_id' => '1', 'menu_id' => '2'),
            array('id' => '55', 'group_id' => '1', 'menu_id' => '3'),
            array('id' => '56', 'group_id' => '1', 'menu_id' => '4'),
            array('id' => '57', 'group_id' => '1', 'menu_id' => '5'),
            array('id' => '58', 'group_id' => '1', 'menu_id' => '6'),
            array('id' => '59', 'group_id' => '1', 'menu_id' => '7'),
            array('id' => '60', 'group_id' => '2', 'menu_id' => '1'),
            array('id' => '61', 'group_id' => '2', 'menu_id' => '2'),
            array('id' => '62', 'group_id' => '2', 'menu_id' => '3'),
            array('id' => '67', 'group_id' => '1', 'menu_id' => '17'),
            array('id' => '68', 'group_id' => '2', 'menu_id' => '17')
        );

        foreach ($groups_menu as $key => $value) {
            $this->db->table('groups_menu')->replace($value);
        }


        $files = glob(ROOTPATH . "writable/cache/*"); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                if (str_contains($file, "group_menu") || str_contains($file, "permissions")) {

                    unlink($file); // delete file
                }
            }
        }

        //GUARDAR EN BITACORA
        $this->bitacora->save($bitacoraDatos);
        //  return redirect()->to("/admin/hospital");
        return redirect()->back()->with('sweet-success', 'Actualizado Correctamente');
        // return redirect()->back()->with('sweet-success','Guardado Correctamente');
    }
}
