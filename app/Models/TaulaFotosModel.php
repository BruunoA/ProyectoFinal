<?php

namespace App\Models;

use CodeIgniter\Model;

class TaulaFotosModel extends Model
{
    protected $table            = 'taula_fotos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['titol', 'ruta', 'descripcio', 'banner', 'id_album', 'estat', 'id_club', 'publicated_at'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['setPublicatedAt'];
    protected $afterInsert    = ['setPublicatedAt'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getNextId()
    {
        $query = $this->db->query("SHOW TABLE STATUS LIKE '" . $this->table . "'");
        $row = $query->getRow();
        return $row->Auto_increment;
    }
    protected function setPublicatedAt(array $data)
    {
        if (isset($data['data']['estat'])) {
            // Manejar tanto valores numéricos como textuales
            $esPublicado = (is_numeric($data['data']['estat']))
                ? ($data['data']['estat'] == 1)
                : ($data['data']['estat'] === 'publicat');

            $data['data']['publicated_at'] = $esPublicado ? date('Y-m-d H:i:s') : null;
        }
        return $data;
    }
}
