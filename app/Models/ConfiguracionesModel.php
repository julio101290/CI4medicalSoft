<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfiguracionesModel extends Model
{
    protected $table      = 'configuraciones';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id'
        ,'nombreHospital'
        , 'RFC'
        ,'telefono'
        ,'correoElectronico'
        ,'direccion'
        ,'languaje'
        ];

    
 
}