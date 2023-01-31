<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicamentosModel extends Model
{
    protected $table      = 'medicamentos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id','descripcion', 'created_at','updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    =  [
        'descripcion'     => 'required|alpha_numeric_space|min_length[3]'
        
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
   
}