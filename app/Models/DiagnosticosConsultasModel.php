<?php

namespace App\Models;

use CodeIgniter\Model;

class DiagnosticosConsultasModel extends Model {

    protected $table = 'consulta_diagnosticos';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'idConsulta', 'idDiagnostico', 'descripcion', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    /**
     * GET DIAGNOSES FOR MEDICAL CONSULTATION
     */
    public function mdlGetDiagnosesPerConsultation($idConsultation) {


        $result = $this->db->table('consulta_diagnosticos')
        ->select('id,idConsulta'
                . ',idDiagnostico'
                . ',descripcion'
                . ',created_at'
                . ',updated_at'
                . ',deleted_at')
        ->where("idConsulta",$idConsultation)
        ->get() ->getResultArray();

        return $result;
    }
}
