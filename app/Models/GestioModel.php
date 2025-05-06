<?php

namespace App\Models;

use CodeIgniter\Model;

class GestioModel extends Model
{
    protected $table            = 'gestio';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nom', 'resum', 'contingut', 'seccio', 'portada', 'url', 'estat', 'id_club'];

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
    protected $validationRules      = [
        // 'nom' => 'required',
        // 'resum' => 'required',
        // 'seccio' => 'required',
        // 'id_club' => 'required',
        // 'contingut' => 'required'
    ];
    // TODO: Variable per gestionar si està actiu o no (true o false), INTENTAR ficar un if a la validationRules
    protected $validationMessages   = [
        // 'nom' => [
        //     'required' => 'El camp nom és obligatori'
        // ],
        // 'resum' => [
        //     'required' => 'El camp resum és obligatori'
        // ],
        // 'seccio' => [
        //     'required' => 'La camp secció és obligatoria'
        // ],
        // 'contingut' => [
        //     'required' => 'El camp contingut és obligatori'
        // ]
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
    
    public function getByTitleOrText ($search) {
                   
        return $this->select(['id','nom','contingut'])->orLike('nom',$search,'both',true)->orLike('contingut',$search,'both',true);
    }

    public function getAllPaged ($nElements) {
       
        return $this->select(['id','nom','contingut'])->paginate($nElements);
}
}


