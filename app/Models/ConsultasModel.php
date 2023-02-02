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



}
