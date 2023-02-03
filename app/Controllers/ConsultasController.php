<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\PacientesModel;
use \App\Models\BitacoraModel;
use \App\Models\ConsultasModel;
use App\Models\DiagnosticosConsultasModel;
use App\Models\TratamientosConsultasModel;
use App\Models\ConfiguracionesModel;
use julio101290\boilerplate\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class ConsultasController extends BaseController {

    use ResponseTrait;

    protected $bitacora;
    protected $pacientes;
    protected $consultas;
    protected $diagnosticosConsultas;
    protected $tratamientosConsultas;
    protected $configuraciones;
    protected $usuarios;

    public function __construct() {
        $this->pacientes = new PacientesModel();
        $this->bitacora = new BitacoraModel();
        $this->consultas = new ConsultasModel();

        $this->diagnosticosConsultas = new DiagnosticosConsultasModel();
        $this->tratamientosConsultas = new TratamientosConsultasModel();
        $this->configuraciones = new ConfiguracionesModel();
        $this->usuarios = new UserModel();
        helper('menu');
        helper('utilerias');
    }

    public function index() {


        if ($this->request->isAJAX()) {


            $datos = $this->consultas->mdlTraeConsultas();

            return \Hermawan\DataTables\DataTable::of($datos)->toJson(true);
            
        }
        


        $titulos["listaTitle"] = lang('consultas.title');
        $titulos["listaSubtitle"] = lang('consultas.subtitle');

//$data["data"] = $datos;
        return view('listaConsultas', $titulos);
    }

    /*
     * Lee paciente
     */

    public function generarConsulta() {


        helper('auth');
        $userName = user()->username;
        $idUser = user()->id;

        $fechaActual = fechaMySQLADateTimeHTML5(fechaHoraActual());
        $titulos["fecha"] = $fechaActual;
        $titulos["userName"] = $userName;
        $titulos["idUser"] = $idUser;

        $titulos["uuid"] = generaUUID();

        $titulos["title"] = lang('consultas.title');
        $titulos["subtitle"] = lang('consultas.subtitle');

        return view('consultaMedica', $titulos);
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

        $existeConsulta = $this->consultas->where("uuid", $datos["uuid"])->countAllResults();

        $diagnosticos = json_decode($datos["diagnosticos"], true);
        $tratamientos = json_decode($datos["tratamientos"], true);

        if ($existeConsulta == 0) {


            try {


                if ($this->consultas->save($datos) === false) {

                    $errores = $this->consultas->errors();

                    foreach ($errores as $field => $error) {

                        echo $error . " ";
                    }




                    return;
                }

                $idConsultaInsertada = $this->consultas->getInsertID();
                $intContador = 0;

                $this->tratamientosConsultas->where("idConsulta", $idConsultaInsertada)->delete();
                $this->tratamientosConsultas->purgeDeleted();
                foreach ($diagnosticos as $values => $value) {



                    $detalleDiagnosticos["renglon"] = $intContador;
                    $detalleDiagnosticos["idConsulta"] = $idConsultaInsertada;
                    $detalleDiagnosticos["idDiagnostico"] = $value["idDiagnostico"];
                    $detalleDiagnosticos["descripcion"] = $value["descripcion"];

                    $this->diagnosticosConsultas->insert($detalleDiagnosticos);

                    $intContador++;
                }


                $intContador = 0;

                $this->tratamientosConsultas->where("idConsulta", $idConsultaInsertada)->delete();

                $this->tratamientosConsultas->purgeDeleted();
                foreach ($tratamientos as $values => $value) {



                    $detalleTratamientos["renglon"] = $intContador;
                    $detalleTratamientos["idConsulta"] = $idConsultaInsertada;
                    $detalleTratamientos["idTratamiento"] = $value["idTratamiento"];
                    $detalleTratamientos["descripcion"] = $value["descripcion"];
                    $detalleTratamientos["uso"] = $value["uso"];

                    $this->tratamientosConsultas->insert($detalleTratamientos);

                    $intContador++;
                }

                $datosBitacora["descripcion"] = "Se guardo la consulta con los siguientes datos: " . json_encode($datos);
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
        if (!$found = $this->pacientes->delete($id)) {
            return $this->failNotFound(lang('patients.msg.msg_get_fail'));
        }

        $infoPaciente = $this->pacientes->find($id);

        $datosBitacora["descripcion"] = "Se elimino el paciente que contenia los siguientes datos " . json_encode($infoPaciente);

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

    /**
     * Reporte Consulta
     */
    public function reporte($uuid) {

        $datosEncabezado = $this->configuraciones->where("id", 1)->first();

        $pdf = new PDFLayout(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $datosConsulta = $this->consultas->where("uuid", $uuid)->first();
        
        $tratamientosRenglones = $this->tratamientosConsultas->where("idConsulta",$datosConsulta["id"])->findAll();
        
  

        $doctor = $this->usuarios->where("id", $datosConsulta["idDoctor"])->first()->toArray();

        $paciente = $this->pacientes->where("id", $datosConsulta["paciente"])->first();

        $pacienteNombre = str_pad($paciente["nombres"] . " " . $paciente["apellidos"], 150, " ", STR_PAD_RIGHT);

        $idConsulta = str_pad($datosConsulta["id"], 5, "0", STR_PAD_LEFT);

        $fechaConsulta = $datosConsulta["fechaHora"];

        //ETIQUETAS
        $etiquetaPaciente = lang('consultas.paciente');
        $folioConsulta = lang('consultas.folioConsulta');
        $fecha = lang('consultas.fechaConsulta');
        $medicamentoTratamiento = lang('consultas.medicamentoTratamiento');
        $uso = lang('consultas.usoColumna2');
        $motivoConsultaEtiqueta = lang('consultas.motivoConsultaPlaceholder');

        // set document information
        $pdf->nombreEmpresa = $datosEncabezado["nombreHospital"];
        $pdf->direccion = $datosEncabezado["direccion"];
        $pdf->doctor = $doctor["firstname"]. " ".$doctor["lastname"] ;
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($doctor["username"]);
        $pdf->SetTitle('MedicalSoft');
        $pdf->SetSubject('MedicalSoft');
        $pdf->SetKeywords('MedicalSoft, PDF, PHP, CodeIgniter, JCPOS2021');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 35, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // ---------------------------------------------------------
        // add a page
        $pdf->AddPage();

        //ETIQUETAS
        $etiquetaPaciente = lang('consultas.paciente');
        $folioConsulta = lang('consultas.folioConsulta');
        $fecha = lang('consultas.fechaConsulta');
        $medicamentoTratamiento = lang('consultas.medicamentoTratamiento');
        $uso = lang('consultas.usoColumna2');

        // set font
        $pdf->SetFont('times', 'BI', 12);

        // set some text to print
        $txt = <<<EOD
            $etiquetaPaciente                                                                                                                               $folioConsulta
            EOD;

        // print a block of text using Write()
        $pdf->Write(0, $txt, '', 0, 'left', true, 0, false, false, 0);

        $pdf->SetFont('times', 'i', 12);

        $txt = <<<EOD
            <table style="font-size:14px; padding:5px 10px;">

                    <tr>

                    <td style="width: 50%;  padding: 4px 4px 4px; font-weight:bold;   text-align:left">$pacienteNombre</td>
            
                    <td style="width: 50%;  padding: 4px 4px 4px; font-weight:bold; text-align:right">$idConsulta</td>

                    </tr>
                
                                    <tr>

                    <td style="width: 50%;  padding: 4px 4px 4px; font-weight:bold;   text-align:left">$motivoConsultaEtiqueta: $datosConsulta[motivoConsulta]</td>
            
                    <td style="width: 50%;  padding: 4px 4px 4px; font-weight:bold; text-align:right">$fechaConsulta</td>

                    </tr>

            </table>

          
            EOD;

        $pdf->SetFont('times', '', 12);

        $pdf->writeHTML($txt, false, false, false, false, '');

        $pdf->writeHTML("<hr>", true, false, false, false, '');
        
        
        $renglonTratamientos = "";
        
        $contador = 0;
        
        foreach ($tratamientosRenglones as $values=>$value){
            
             if ($contador % 2 == 0) {
                $clase = 'style=" background-color:#ecf0f1; padding: 3px 4px 3px; "';
            } else {
                $clase = 'style="background-color:white; padding: 3px 4px 3px; "';
            }
            
            $renglonTratamientos .= <<<EOD
                    
                    <tr $clase>

                    <td style="width: 50%;     text-align:left">$value[descripcion]</td>
            
                    <td style="width: 50%;   text-align:left">$value[uso]</td>

                    </tr>
            
             EOD;
            
            $contador++;
        }

        $txt = <<<EOD
                <br>
            <table style="font-size:14px;" >

                    <tr>

                    <td style="width: 50%;    text-align:left">$medicamentoTratamiento</td>
            
                    <td style="width: 50%;   text-align:left">$uso</td>

                    </tr>
                <hr>
                
                $renglonTratamientos

            </table>

          
            EOD;

        $pdf->writeHTML($txt, false, false, false, false, '');

        // ---------------------------------------------------------
        //Close and output PDF document
        $this->response->setHeader("Content-Type", "application/pdf");
        $pdf->Output('example_003.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }

}
