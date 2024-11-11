<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultasModel extends Model {

    protected $table = 'consultas';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'paciente', 'fechaHora', 'idDoctor', 'motivoConsulta', 'created_at', 'updated_at', 'uuid'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'paciente' => 'required'
        , 'fechaHora' => 'required'
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlTraeConsultas() {


        $resultado = $this->db->table('consultas a, pacientes b, users c')
                ->select('a.id,concat(b.nombres,\' \',b.apellidos) as nombrePaciente'
                        . ',concat(c.firstname,\' \',c.lastname) as nombreDoctor'
                        . ',a.motivoConsulta'
                        . ',a.fechaHora'
                        . ',a.created_at'
                        . ',a.uuid')
                ->where('a.paciente', 'b.id', false)
                ->where('a.idDoctor', 'c.id', false)
                ->where('a.deleted_at', null);

        return $resultado;
    }

    /**
     * 
     * @return type
     */
    public function mdlTraeConsulta($idConsulta) {


        $resultado = $this->db->table('consultas a, pacientes b, users c')
                        ->select('a.id,concat(b.nombres,\' \',b.apellidos) as nombrePaciente'
                                . ',concat(c.firstname,\' \',c.lastname) as nombreDoctor'
                                . ',a.motivoConsulta'
                                . ',a.id as idConsulta'
                                . ',a.idDoctor '
                                . ',a.paciente'
                                . ',a.fechaHora'
                                . ',a.created_at'
                                . ',a.uuid')
                        ->where('a.paciente', 'b.id', false)
                        ->where('a.idDoctor', 'c.id', false)
                        ->where('a.deleted_at', null)->get()->getResultArray();

        return $resultado;
    }

    /**
     * Consultas por paciente
     */
    public function mdlTraeConsultasPorPaciente($paciente) {


        $resultado = $this->db->table('consultas a, pacientes b, users c')
                ->select('a.id,concat(b.nombres,\' \',b.apellidos) as nombrePaciente'
                        . ',concat(c.firstname,\' \',c.lastname) as nombreDoctor'
                        . ',a.motivoConsulta'
                        . ',a.fechaHora'
                        . ',a.created_at'
                        . ',a.uuid')
                ->where('a.paciente', 'b.id', false)
                ->where('a.idDoctor', 'c.id', false)
                ->where('a.deleted_at', null)
                ->where('a.paciente', $paciente, false);

        return $resultado;
    }

    /**
     * Get 10 More frequent
     */
    public function mdlTenPatientMoreFrequent() {

        $result = $this->db->table('consultas a, pacientes c')
                        ->select('concat(c.nombres,\' \',apellidos) as nombre,count(*) as total')
                        ->where('a.paciente', 'c.id', FALSE)
                        ->groupBy(array('a.paciente', 'concat(c.nombres,\' \',apellidos)'))
                        ->get(10)->getResultArray();

        return $result;
    }

    /**
     * Get 10 mores Diagnoses Frequent
     */
    public function mdlTenDiagnosesFrequent() {

        $result = $this->db->table('consulta_diagnosticos a')
                ->select('a.descripcion,count(*) as total')
                ->groupBy(array('a.idDiagnostico', 'a.descripcion'))
                ->get(10)->getResultArray();
        
        return $result;
    }
}
