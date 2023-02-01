<?php

namespace App\Models;

use CodeIgniter\Model;

class TratamientosConsultasModel extends Model
{
    protected $table      = 'consultas_tratamientos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id','idConsulta', 'idTratamiento','descripcion','uso','created_at','updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    =  [
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
   
}