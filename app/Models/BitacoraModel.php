<?php

namespace App\Models;

use CodeIgniter\Model;

class BitacoraModel extends Model
{
    protected $table      = 'bitacora';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id','descripcion', 'usuario'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    
    
    
    const ORDERABLE = [
        1 => 'id',
        2 => 'descripcion',
        3 => 'usuario',
        4 => 'created_at',
        
    ];

    /**
     * Get resource data.
     *
     * @param string $search
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
   public function getResource(string $search = '')
    {
        $builder = $this->builder()
            ->select('id, descripcion, usuario, created_at');

        $condition = empty($search)
            ? $builder
            : $builder->groupStart()
                ->like('descripcion', $search)
                ->orLike('Usuario', $search)
                ->orLike('created_at', $search)
            ->groupEnd();

        return $condition->where('deleted_at', null);
    }
}