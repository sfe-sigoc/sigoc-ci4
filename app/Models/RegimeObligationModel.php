<?php

namespace App\Models;

use CodeIgniter\Model;

class RegimeObligationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'REGIME_OBLIGATION';
    protected $primaryKey       = 'CODE';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\RegimeObligationEntity::class; //'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'CODE',
        'CODE_REGIME',
        'CODE_OBLIGATION',
        'TAUX',
        'DUREE',
        'LIBELLE',
        'UNITE_DUREE',
        'UNITE_TAUX',
        'REFERENCE_ARRETE'
    ];

    // Dates
    protected $useTimestamps = false;
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
}
