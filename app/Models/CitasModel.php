<?php

namespace App\Models;

use CodeIgniter\Model;

class CitasModel extends Model {

    protected $table = 'citas';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'idPaciente', 'fechaHora', 'hastaFechaHora', 'observaciones', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [
        'observaciones' => 'required|alpha_numeric_space|min_length[3]'
        , 'idPaciente' => 'required'
        , 'fechaHora' => 'required'
        , 'hastaFechaHora' => 'required'
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function mdlObtenerDatos() {

        $resultado = $this->db->table('citas a, pacientes b')
                ->select('a.id,concat(b.nombres,\' \',b.apellidos) as nombrePaciente,a.observaciones,a.fechaHora,a.hastaFechaHora,estado,a.created_at,a.updated_at')
                ->where('a.idPaciente', 'b.id', false)
                ->where('a.deleted_at', null);

        return $resultado;
    }

    public function mdlObtenerCita($idCita) {

        $resultado = $this->db->table('citas a, pacientes b')
                        ->select('a.id,concat(b.nombres,\' \',b.apellidos) as nombrePaciente,a.observaciones,a.fechaHora,a.hastaFechaHora,estado,a.created_at,a.updated_at,a.idPaciente')
                        ->where('a.idPaciente', 'b.id', false)
                        ->where('a.deleted_at', null)
                        ->where('a.id', $idCita, null)->get()->getResultArray();

        return $resultado[0];
    }

}
