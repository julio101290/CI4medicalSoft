<?php

namespace App\Controllers;

use CodeIgniter\Config\Services;
use App\Controllers\BaseController;
use App\Controllers\Time;
use CodeIgniter\API\ResponseTrait;
use Faker\Provider\zh_CN\DateTime;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;
use julio101290\boilerplate\Models\MenuModel;

class AutoCrudController extends BaseController {

    use ResponseTrait;

    protected $db;

    /**
     * @var Authorize
     */
    protected $authorize;

    /**
     * @var Users
     */
    protected $users;

    //protected $menu;

    public function __construct() {
        $this->db = \Config\Database::connect();

        $this->authorize = Services::authorization();
        $this->users = new UserModel();

        helper('utilerias');
    }

    public function index($table) {


        
           
         /* $this->generateModel($table);
          $this->generateController($table);
          $this->generateView($table);
          $this->generateViewModal($table);
          $this->generateLanguage($table);

          $this->generateMigration($table);
          $this->generateLanguageES($table);
          $this->generatePermissions($table);
        
         
       */
        $tableUpCase = ucfirst($table);

        $route = <<<EOF
                 \$routes->resource('$table', [
                                'filter' => 'permission:$table-permission',
                                'controller' => '{$table}Controller',
                            'except' => 'show'
                            ]);
                \$routes->post('$table/save', '{$tableUpCase}Controller::save');
             \$routes->post('{$table}/get{$tableUpCase}', '{$tableUpCase}Controller::get$tableUpCase');
        EOF;

        echo $route;
    }

    /**
     * Generate Model
     */
    public function generateModel($table) {

        $tableUpCase = ucfirst($table);
        $query = $this->db->getFieldNames($table);

        $fields = "";

        foreach ($query as $field) {
            $fields .= "'" . $field . "'" . ",";
        }


        $fields = substr($fields, 0, strlen($fields) - 1);

        $fields2 = "";

        foreach ($query as $field2) {
            $fields2 .= "a." . $field2 . ",";
        }


        $fields2 = substr($fields2, 0, strlen($fields2) - 1);

        $nombreClase = ucfirst($table) . "Model";

        $nombreTabla = ucfirst($table);

        $model = <<<EOF
        <?php
        namespace App\Models;
        use CodeIgniter\Model;
        class $nombreClase extends Model{
            protected \$table      = '$table';
            protected \$primaryKey = 'id';
            protected \$useAutoIncrement = true;
            protected \$returnType     = 'array';
            protected \$useSoftDeletes = true;
            protected \$allowedFields = [$fields];
            protected \$useTimestamps = true;
            protected \$createdField  = 'created_at';
            protected \$deletedField  = 'deleted_at';
            protected \$validationRules    =  [
            ];
            protected \$validationMessages = [];
            protected \$skipValidation     = false;
        
        
        
            public function mdlGet$nombreTabla(\$idEmpresas){

                \$result = \$this->db->table('$table a, empresas b')
                         ->select('$fields2 ,b.nombre as nombreEmpresa')
                         ->where('a.idEmpresa', 'b.id', FALSE)
                         ->whereIn('a.idEmpresa',\$idEmpresas);
         
                 return \$result;
             }
        
        }
                
        EOF;

        file_put_contents(ROOTPATH . "app/Models/$nombreClase.php", $model);
    }

    /**
     * Generate Controller
     * 
     */

    /**
     * Generate Controller
     */
    public function generateController($table) {

        $query = $this->db->getFieldNames($table);

        $fields = "";

        foreach ($query as $field) {
            $fields .= $field . ",";
        }


        $fields = substr($fields, 0, strlen($fields) - 1);

        $nameClassModel = ucfirst($table) . "Model";

        $tableUpCase = ucfirst($table);

        $controller = <<<EOF
        <?php
         namespace App\Controllers;
         use App\Controllers\BaseController;
         use \App\Models\{$nameClassModel};
         use App\Models\LogModel;
         use CodeIgniter\API\ResponseTrait;
         use App\Models\EmpresasModel;

         class {$tableUpCase}Controller extends BaseController {
             use ResponseTrait;
             protected \$log;
             protected $$table;
             public function __construct() {
                 \$this->$table = new $nameClassModel();
                 \$this->log = new LogModel();
                 \$this->empresa = new EmpresasModel();
                 helper('menu');
                 helper('utilerias');
             }
             public function index() {



                helper('auth');

                \$idUser = user()->id;
                \$titulos["empresas"] = \$this->empresa->mdlEmpresasPorUsuario(\$idUser);
        
                if (count(\$titulos["empresas"]) == "0") {
        
                    \$empresasID[0] = "0";
                } else {
        
                    \$empresasID = array_column(\$titulos["empresas"], "id");
                }
        
    


                 if (\$this->request->isAJAX()) {
                    \$datos = \$this->{$table}->mdlGet$tableUpCase(\$empresasID);
                     
                 
                     return \Hermawan\DataTables\DataTable::of(\$datos)->toJson(true);
                 }
                 \$titulos["title"] = lang('$table.title');
                 \$titulos["subtitle"] = lang('$table.subtitle');
                 return view('$table', \$titulos);
             }
             /**
              * Read $tableUpCase
              */
             public function get$tableUpCase() {
                
                helper('auth');

                \$idUser = user()->id;
                \$titulos["empresas"] = \$this->empresa->mdlEmpresasPorUsuario(\$idUser);

                if (count(\$titulos["empresas"]) == "0") {

                    \$empresasID[0] = "0";
                } else {

                    \$empresasID = array_column(\$titulos["empresas"], "id");
                }
                
                
                \$id$tableUpCase = \$this->request->getPost("id$tableUpCase");
                 \$datos$tableUpCase = \$this->{$table}->whereIn('idEmpresa',\$empresasID)
                 ->where("id",\$id$tableUpCase)->first();
                 echo json_encode(\$datos$tableUpCase);
             
             
                }
             /**
              * Save or update $tableUpCase
              */
             public function save() {
                 helper('auth');
                 \$userName = user()->username;
                 \$idUser = user()->id;
                 \$datos = \$this->request->getPost();
                 if (\$datos["id$tableUpCase"] == 0) {
                     try {
                         if (\$this->{$table}->save(\$datos) === false) {
                             \$errores = \$this->{$table}->errors();
                             foreach (\$errores as \$field => \$error) {
                                 echo \$error . " ";
                             }
                             return;
                         }
                         \$dateLog["description"] = lang("vehicles.logDescription") . json_encode(\$datos);
                         \$dateLog["user"] = \$userName;
                         \$this->log->save(\$dateLog);
                         echo "Guardado Correctamente";
                     } catch (\PHPUnit\Framework\Exception \$ex) {
                         echo "Error al guardar " . \$ex->getMessage();
                     }
                 } else {
                     if (\$this->{$table}->update(\$datos["id$tableUpCase"], \$datos) == false) {
                         \$errores = \$this->{$table}->errors();
                         foreach (\$errores as \$field => \$error) {
                             echo \$error . " ";
                         }
                         return;
                     } else {
                         \$dateLog["description"] = lang("$table.logUpdated") . json_encode(\$datos);
                         \$dateLog["user"] = \$userName;
                         \$this->log->save(\$dateLog);
                         echo "Actualizado Correctamente";
                         return;
                     }
                 }
                 return;
             }
             /**
              * Delete $tableUpCase
              * @param type \$id
              * @return type
              */
             public function delete(\$id) {
                 \$info$tableUpCase = \$this->{$table}->find(\$id);
                 helper('auth');
                 \$userName = user()->username;
                 if (!\$found = \$this->{$table}->delete(\$id)) {
                     return \$this->failNotFound(lang('$table.msg.msg_get_fail'));
                 }
                 \$this->{$table}->purgeDeleted();
                 \$logData["description"] = lang("{$table}.logDeleted") . json_encode(\$info$tableUpCase);
                 \$logData["user"] = \$userName;
                 \$this->log->save(\$logData);
                 return \$this->respondDeleted(\$found, lang('$table.msg_delete'));
             }
         }
                
        EOF;

        file_put_contents(ROOTPATH . "app/Controllers/{$tableUpCase}Controller.php", $controller);
    }

    /**
     * Generate View
     */
    public function generateView($table) {

        $tableUpCase = ucfirst($table);
        $query = $this->db->getFieldNames($table);

        $fields = "";

        $columnaDatatable = "";
        $datosDatatable = "";
        $variablesGuardar1 = "";
        $variablesFormData = "";
        $inputsEdit = "";
        $contador = 0;
        foreach ($query as $field) {
            $fields .= $field . ",";

            if ($contador > 0) {

                $columnaDatatable .= "<th><?= lang('$table.fields.$field') ?></th>" . PHP_EOL;

                $datosDatatable .= <<<EOF
                         
                        {
                            'data': '$field'
                        },
                        EOF . PHP_EOL;
                if ($field <> "created_at" && $field <> "updated_at" && $field <> "deleted_at") {
                    $variablesGuardar1 .= "var $field = $(\"#$field\").val();" . PHP_EOL;
                    $variablesFormData .= "datos.append(\"$field\", $field);" . PHP_EOL;

                    if ($field == "idEmpresa") {

                        $inputsEdit .= "$(\"#$field\").val(respuesta[\"$field\"]).trigger(\"change\");" . PHP_EOL;
                    } else {

                        $inputsEdit .= "$(\"#$field\").val(respuesta[\"$field\"]);" . PHP_EOL;
                    }
                }
            } else {
                $variablesGuardar1 .= <<<EOF
                    
                    var id$tableUpCase = $("#id$tableUpCase").val();
                    EOF . PHP_EOL;

                $variablesFormData .= <<<EOF
                        var datos = new FormData();
                        datos.append("id$tableUpCase", id$tableUpCase);
                        EOF . PHP_EOL;
            }
            $contador++;
        }
        $fields = substr($fields, 0, strlen($fields) - 1);
        $nameClassModel = ucfirst($table) . "Model";
        $view = <<<EOF
        <?= \$this->include('julio101290\boilerplate\Views\load\select2') ?>
        <?= \$this->include('julio101290\boilerplate\Views\load\datatables') ?>
        <?= \$this->include('julio101290\boilerplate\Views\load\\nestable') ?>
        <!-- Extend from layout index -->
        <?= \$this->extend('julio101290\boilerplate\Views\layout\index') ?>

        <!-- Section content -->
        <?= \$this->section('content') ?>

        <?= \$this->include('modules$tableUpCase/modalCapture$tableUpCase') ?>

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
         <div class="card-header">
             <div class="float-right">
                 <div class="btn-group">

                     <button class="btn btn-primary btnAdd$tableUpCase" data-toggle="modal" data-target="#modalAdd$tableUpCase"><i class="fa fa-plus"></i>

                         <?= lang('$table.add') ?>

                     </button>

                 </div>
             </div>
         </div>
         <div class="card-body">
             <div class="row">
                 <div class="col-md-12">
                     <div class="table-responsive">
                         <table id="table$tableUpCase" class="table table-striped table-hover va-middle table$tableUpCase">
                             <thead>
                                 <tr>

                                     <th>#</th>
                                     $columnaDatatable
                                     <th><?= lang('$table.fields.actions') ?> </th>

                                 </tr>
                             </thead>
                             <tbody>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
        </div>
        <!-- /.card -->

        <?= \$this->endSection() ?>


        <?= \$this->section('js') ?>
        <script>

         /**
          * Cargamos la tabla
          */

         var table{$tableUpCase} = $('#table{$tableUpCase}').DataTable({
             processing: true,
             serverSide: true,
             responsive: true,
             autoWidth: false,
             order: [[1, 'asc']],

             ajax: {
                 url: '<?= base_url('admin/$table') ?>',
                 method: 'GET',
                 dataType: "json"
             },
             columnDefs: [{
                     orderable: false,
                     targets: [$contador],
                     searchable: false,
                     targets: [$contador]

                 }],
             columns: [{
                     'data': 'id'
                 },
                
                 $datosDatatable
                 {
                     "data": function (data) {
                         return `<td class="text-right py-0 align-middle">
                                 <div class="btn-group btn-group-sm">
                                     <button class="btn btn-warning btnEdit$tableUpCase" data-toggle="modal" id$tableUpCase="\${data.id}" data-target="#modalAdd$tableUpCase">  <i class=" fa fa-edit"></i></button>
                                     <button class="btn btn-danger btn-delete" data-id="\${data.id}"><i class="fas fa-trash"></i></button>
                                 </div>
                                 </td>`
                     }
                 }
             ]
         });



         $(document).on('click', '#btnSave$tableUpCase', function (e) {

             $variablesGuardar1
             $("#btnSave$tableUpCase").attr("disabled", true);

             $variablesFormData

             $.ajax({

                 url: "<?= base_url('admin/$table/save') ?>",
                 method: "POST",
                 data: datos,
                 cache: false,
                 contentType: false,
                 processData: false,
                 success: function (respuesta) {
                     if (respuesta.match(/Correctamente.*/)) {
                
                         Toast.fire({
                             icon: 'success',
                             title: "Guardado Correctamente"
                         });

                         table$tableUpCase.ajax.reload();
                         $("#btnSave$tableUpCase").removeAttr("disabled");


                         $('#modalAdd$tableUpCase').modal('hide');
                     } else {

                         Toast.fire({
                             icon: 'error',
                             title: respuesta
                         });

                         $("#btnSave$tableUpCase").removeAttr("disabled");
                        

                     }

                 }

             }

             ).fail(function (jqXHR, textStatus, errorThrown) {

                if (jqXHR.status === 0) {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "No hay conexión.!" + jqXHR.responseText
                    });

                    $("#btnSave$tableUpCase").removeAttr("disabled");


                } else if (jqXHR.status == 404) {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Requested page not found [404]" + jqXHR.responseText
                    });

                    $("#btnSave$tableUpCase").removeAttr("disabled");

                } else if (jqXHR.status == 500) {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Internal Server Error [500]." + jqXHR.responseText
                    });


                    $("#btnSave$tableUpCase").removeAttr("disabled");

                } else if (textStatus === 'parsererror') {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Requested JSON parse failed." + jqXHR.responseText
                    });

                   $("#btnSave$tableUpCase").removeAttr("disabled");

                } else if (textStatus === 'timeout') {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Time out error." + jqXHR.responseText
                    });

                   $("#btnSave$tableUpCase").removeAttr("disabled");

                } else if (textStatus === 'abort') {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Ajax request aborted." + jqXHR.responseText
                    });

                    $("#btnSave$tableUpCase").removeAttr("disabled");

                } else {

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: 'Uncaught Error: ' + jqXHR.responseText
                    });


                    $("#btnSave$tableUpCase").removeAttr("disabled");

                }
            })

         });



         /**
          * Carga datos actualizar
          */


         /*=============================================
          EDITAR $tableUpCase
          =============================================*/
         $(".table$tableUpCase").on("click", ".btnEdit$tableUpCase", function () {

             var id$tableUpCase = $(this).attr("id$tableUpCase");
                
             var datos = new FormData();
             datos.append("id$tableUpCase", id$tableUpCase);

             $.ajax({

                 url: "<?= base_url('admin/$table/get$tableUpCase')?>",
                 method: "POST",
                 data: datos,
                 cache: false,
                 contentType: false,
                 processData: false,
                 dataType: "json",
                 success: function (respuesta) {
                     $("#id$tableUpCase").val(respuesta["id"]);
                     
                     $inputsEdit

                 }

             })

         })


         /*=============================================
          ELIMINAR $table
          =============================================*/
         $(".table$tableUpCase").on("click", ".btn-delete", function () {

             var id$tableUpCase = $(this).attr("data-id");

             Swal.fire({
                 title: '<?= lang('boilerplate.global.sweet.title') ?>',
                 text: "<?= lang('boilerplate.global.sweet.text') ?>",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: '<?= lang('boilerplate.global.sweet.confirm_delete') ?>'
             })
                     .then((result) => {
                         if (result.value) {
                             $.ajax({
                                 url: `<?= base_url('admin/$table') ?>/` + id$tableUpCase,
                                 method: 'DELETE',
                             }).done((data, textStatus, jqXHR) => {
                                 Toast.fire({
                                     icon: 'success',
                                     title: jqXHR.statusText,
                                 });


                                 table$tableUpCase.ajax.reload();
                             }).fail((error) => {
                                 Toast.fire({
                                     icon: 'error',
                                     title: error.responseJSON.messages.error,
                                 });
                             })
                         }
                     })
         })

         $(function () {
            $("#modalAdd$tableUpCase").draggable();
            
        });


        </script>
        <?= \$this->endSection() ?>
                
        EOF;

        file_put_contents(ROOTPATH . "app/Views/{$table}.php", $view);
    }

    /**
     * Generate ViewModal
     */
    public function generateViewModal($table) {

        $tableUpCase = ucfirst($table);
        $query = $this->db->getFieldNames($table);

        $fields = "";

        $campos = "";
        $contador = 0;
        foreach ($query as $field) {
            $fields .= $field . ",";

            if ($contador > 0) {




                if ($field <> "created_at" && $field <> "updated_at" && $field <> "deleted_at") {


                    if ($field == "idEmpresa") {

                        $campos .= <<<EOF
                                    <div class="form-group row">
                                        <label for="emitidoRecibido" class="col-sm-2 col-form-label">Empresa</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                                </div>

                                                <select class="form-control idEmpresa" name="idEmpresa" id="idEmpresa" style = "width:80%;">
                                                    <option value="0">Seleccione empresa</option>
                                                    <?php
                                                    foreach (\$empresas as \$key => \$value) {

                                                        echo "<option value='\$value[id]' selected>\$value[id] - \$value[nombre] </option>  ";
                                                    }
                                                    ?>

                                                </select>

                                            </div>
                                        </div>
                                    </div>
                        EOF . PHP_EOL;
                    } elseif ($field == "idSucursal") {


                        $campos .= <<<EOF
                                        <div class="form-group row">
                                                      <label for="sucursal" class="col-sm-2 col-form-label">Sucursal</label>
                                                      <div class="col-sm-10">
                                                          <div class="input-group">
                                                              <div class="input-group-prepend">
                                                                  <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                                              </div>

                                                              <select class="form-control sucursal" name="sucursal" id="sucursal" style = "width:80%;">
                                                                  <option value="0">Seleccione sucursal</option>


                                                              </select>

                                                          </div>
                                                      </div>
                                        </div>
                        EOF . PHP_EOL;
                    } else {


                        $campos .= <<<EOF
                        <div class="form-group row">
                            <label for="$field" class="col-sm-2 col-form-label"><?= lang('$table.fields.$field') ?></label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                    </div>
                                    <input type="text" name="$field" id="$field" class="form-control <?= session('error.$field') ? 'is-invalid' : '' ?>" value="<?= old('$field') ?>" placeholder="<?= lang('$table.fields.$field') ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        EOF . PHP_EOL;
                    }
                }
            }




            $contador++;
        }


        $fields = substr($fields, 0, strlen($fields) - 1);

        $nameClassModel = ucfirst($table) . "Model";

        $viewModal = <<<EOF
        <!-- Modal $tableUpCase -->
          <div class="modal fade" id="modalAdd$tableUpCase" tabindex="-1" role="dialog" aria-labelledby="modalAdd$tableUpCase" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title"><?= lang('$table.createEdit') ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form id="form-$table" class="form-horizontal">
                              <input type="hidden" id="id$tableUpCase" name="id$tableUpCase" value="0">

                              $campos
                
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                          <button type="button" class="btn btn-primary btn-sm" id="btnSave$tableUpCase"><?= lang('boilerplate.global.save') ?></button>
                      </div>
                  </div>
              </div>
          </div>

          <?= \$this->section('js') ?>


          <script>

              $(document).on('click', '.btnAdd$tableUpCase', function (e) {


                  $(".form-control").val("");

                  $("#id$tableUpCase").val("0");

                  $("#btnSave$tableUpCase").removeAttr("disabled");

              });

              /* 
               * AL hacer click al editar
               */



              $(document).on('click', '.btnEdit$tableUpCase', function (e) {


                  var id$tableUpCase = $(this).attr("id$tableUpCase");

                  //LIMPIAMOS CONTROLES
                  $(".form-control").val("");

                  $("#id$tableUpCase").val(id$tableUpCase);
                  $("#btnGuardar$tableUpCase").removeAttr("disabled");

              });


            $("#idEmpresa").select2();

          </script>


          <?= \$this->endSection() ?>
                
        EOF;

        $path = ROOTPATH . "app/Views/modules$tableUpCase/";
        if (!is_dir($path))
            mkdir($path, 0777, TRUE);

        file_put_contents($path . "modalCapture{$tableUpCase}.php", $viewModal);
    }

    /**
     * Generate Languaje EN
     */
    public function generateLanguage($table) {

        $tableUpCase = ucfirst($table);
        $query = $this->db->getFieldNames($table);

        $fields = "";

        $campos = "";
        $contador = 0;
        foreach ($query as $field) {
            $fields .= $field . ",";

            if ($contador > 0) {






                $campos .= "\${$table}[\"fields\"][\"$field\"] = \"" . ucfirst($field) . "\";" . PHP_EOL;
            }




            $contador++;
        }


        $fields = substr($fields, 0, strlen($fields) - 1);

        $nameClassModel = ucfirst($table) . "Model";

        $languaje = <<<EOF
         <?php

        \${$table}["logDescription"] = "The $table was saved with the following data:";
        \${$table}["logUpdate"] = "The $table was updated  with the following data:";
        \${$table}["logDeleted"] = "The $table was deleted  with the following data:";
        \${$table}["msg_delete"] = "The $table was deleted  correctly:";

        \${$table}["add"] = "Add $tableUpCase";
        \${$table}["edit"] = "Edit $table";
        \${$table}["createEdit"] = "Create / Edit";
        \${$table}["title"] = "$table management";
        \${$table}["subtitle"] = "$table list";
        $campos
        \${$table}["fields"]["actions"] = "Actions";
        \${$table}["msg"]["msg_insert"] = "The $table has been correctly added.";
        \${$table}["msg"]["msg_update"] = "The $table has been correctly modified.";
        \${$table}["msg"]["msg_delete"] = "The $table has been correctly deleted.";
        \${$table}["msg"]["msg_get"] = "The $tableUpCase has been successfully get.";
        \${$table}["msg"]["msg_get_fail"] = "The $table not found or already deleted.";

        return $$table;
                
        EOF;

        $path = ROOTPATH . "app/Language/en/";
        if (!is_dir($path))
            mkdir($path, 0777, TRUE);

        file_put_contents($path . "$table.php", $languaje);
    }

    /**
     * Lenguaje ES
     * @param type $table
     */
    public function generateLanguageES($table) {

        $tableUpCase = ucfirst($table);
        $query = $this->db->getFieldNames($table);

        $fields = "";

        $campos = "";
        $contador = 0;
        foreach ($query as $field) {
            $fields .= $field . ",";

            if ($contador > 0) {


                $campos .= "\${$table}[\"fields\"][\"$field\"] = \"" . ucfirst($field) . "\";" . PHP_EOL;
            }




            $contador++;
        }


        $fields = substr($fields, 0, strlen($fields) - 1);

        $nameClassModel = ucfirst($table) . "Model";

        $languaje = <<<EOF
         <?php
        \${$table}["logDescription"] = "El registro en $table fue guardado con los siguientes datos:";
        \${$table}["logUpdate"] = "El registro en $table fue actualizado con los siguientes datos:";
        \${$table}["logDeleted"] = "El registro en $table fue eliminado con los siguientes datos:";
        \${$table}["msg_delete"] = "El Registro en $table fue eliminado correctamente:";
        \${$table}["add"] = "Agregar $tableUpCase";
        \${$table}["edit"] = "Editar $table";
        \${$table}["createEdit"] = "Crear / Editar";
        \${$table}["title"] = "Admon. $table";
        \${$table}["subtitle"] = "Lista $table";
        $campos
         \${$table}["fields"]["actions"] = "Acciones";       
        \${$table}["msg"]["msg_insert"] = "Registro agregado correctamente.";
        \${$table}["msg"]["msg_update"] = "Registro modificado correctamente.";
        \${$table}["msg"]["msg_delete"] = "Registro eliminado correctamente.";
        \${$table}["msg"]["msg_get"] = "Registro obtenido correctamente.";
        \${$table}["msg"]["msg_get_fail"] = "Registro no encontrado o eliminado.";
        return $$table;
                
        EOF;

        $path = ROOTPATH . "app/Language/es/";
        if (!is_dir($path))
            mkdir($path, 0777, TRUE);

        file_put_contents($path . "$table.php", $languaje);
    }

    /**
     * Generate Migration
     * @param type $table
     */
    public function generateMigration($table) {

        $tableUpCase = ucfirst($table);
        $query = $this->db->getFieldData($table);

        $campos = "";
        $contador = 0;
        foreach ($query as $field) {



            if ($contador > 0) {


                if ($field->nullable == 1) {

                    $nullable = "true";
                } else {

                    $nullable = "false";
                }
                if ($field->name <> "created_at" && $field->name <> "updated_at" && $field->name <> "deleted_at") {
                    $campos .= "'{$field->name}'             => ['type' => '{$field->type}', 'constraint' => {$field->max_length}, 'null' => $nullable]," . PHP_EOL;
                }
            } else {

                $campos .= "'id'                    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true]," . PHP_EOL;
            }



            $contador++;
        }




        $nameClassModel = ucfirst($table) . "Model";

        $migration = <<<EOF
            <?php
            namespace App\Database\Migrations;
            use CodeIgniter\Database\Migration;
            class $tableUpCase extends Migration
            {
            public function up()
            {
             // $tableUpCase
            \$this->forge->addField([
                $campos
                'created_at'       => ['type' => 'datetime', 'null' => true],
                'updated_at'       => ['type' => 'datetime', 'null' => true],
                'deleted_at'       => ['type' => 'datetime', 'null' => true],
            ]);
            \$this->forge->addKey('id', true);
            \$this->forge->createTable('$table', true);
            }
            public function down(){
                \$this->forge->dropTable('$table', true);
                }
            }
        EOF;

        $path = ROOTPATH . "app/Database/Migrations/";
        if (!is_dir($path))
            mkdir($path, 0777, TRUE);

        $fechaActual = fechaParaMigraciones(fechaHoraActual());

        file_put_contents($path . "{$fechaActual}_{$tableUpCase}.php", $migration);

        //file_put_contents($path . "2023-02-07-165411_$tableUpCase.php", $viewModal);
    }

    /**
     * Generate Migration
     * @param type $table
     */
    public function generatePermissions($table) {


        $permiso = "$table-permission";

        $infoPermiso = $this->authorize->permission($permiso);

        if ($infoPermiso == null) {

            $this->authorize->createPermission($permiso, 'Permiso para la lista de ' . $table);
            $this->authorize->addPermissionToGroup($permiso, 'admin');
            $this->authorize->addPermissionToUser($permiso, 1);
        }
    }
}
