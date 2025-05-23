<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table            = 'albums';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['titol', 'portada', 'id_club', 'estat'/*,'descripcio'*/];   // TODO: VEURE si cal afegir 'descripcio'

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

    protected $validationMessages   = [
        // 'titol' => [
        //     'required' => 'El camp Títol és obligatori.',
        // ],
        // 'portada' => [
        //     'required' => 'El camp Portada és obligatori.',
        // ],
        // 'estat' => [
        //     'required' => 'El camp Estat és obligatori.',
        // ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getByTitleOrText($search)
    {

        return $this->select(['id', 'titol'])->orLike('titol', $search, 'both', true);
    }

    public function getAllPaged($nElements)
    {

        return $this->select(['id', 'titol'])->paginate($nElements);
    }
}
