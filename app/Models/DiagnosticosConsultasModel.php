<?php

namespace App\Models;

use CodeIgniter\Model;

class DiagnosticosConsultasModel extends Model
{
    protected $table      = 'consulta_diagnosticos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id','idConsulta', 'idDiagnostico','descripcion','created_at','updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    =  [
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
   
}