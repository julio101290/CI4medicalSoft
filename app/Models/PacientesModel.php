<?php

namespace App\Models;

use CodeIgniter\Model;

class PacientesModel extends Model
{
    protected $table      = 'pacientes';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id','nombres', 'apellidos','dni','telefono','correoElectronico','created_at','updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    =  [
        'nombres'     => 'required|alpha_numeric_space|min_length[3]',
        'apellidos'     => 'required|alpha_numeric_space|min_length[5]',
        'correoElectronico'        => 'required|valid_email|is_unique[users.email]'
        
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
   
}