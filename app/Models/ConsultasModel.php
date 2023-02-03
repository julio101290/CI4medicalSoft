<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultasModel extends Model {

    protected $table = 'consultas';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'paciente', 'fechaHora', 'idDoctor', 'motivoConsulta', 'created_at', 'updated_at','uuid'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
         'paciente' => 'required'
        , 'fechaHora' => 'required'
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;


    
    
    public function mdlTraeConsultas(){
        
        
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

}
