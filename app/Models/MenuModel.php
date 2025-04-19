<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table            = 'menu';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nom', 'enllaç', 'id_pare', 'visibilitat', 'ordre', 'id_tag'];

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
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getMenu()
    {
        // Obtener todos los elementos del menú visibles
        $menu = $this->where('visibilitat', 1)
                     ->orderBy('ordre', 'ASC') // Ordenar por 'ordre'
                     ->findAll();

        // Organizar los elementos en una estructura jerárquica
        return $this->buildMenuTree($menu);
    }

    // Crear una estructura jerárquica (padre-hijo)
    private function buildMenuTree($menu)
    {
        $menuTree = [];
        $menuItems = [];

        // Crear un array de menú indexado por 'id'
        foreach ($menu as $item) {
            $menuItems[$item['id']] = $item;
            $menuItems[$item['id']]['children'] = [];
        }

        // Organizar los elementos en árbol usando 'id_pare'
        foreach ($menuItems as $id => $item) {
            if ($item['id_pare'] == null) {
                // Si no tiene padre, es un elemento de nivel superior
                $menuTree[] = &$menuItems[$id];
            } else {
                // Si tiene un padre, agregarlo como hijo
                $menuItems[$item['id_pare']]['children'][] = &$menuItems[$id];
            }
        }

        return $menuTree;
    }
}
