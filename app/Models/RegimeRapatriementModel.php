<?php

namespace App\Models;

use CodeIgniter\Model;

class RegimeRapatriementModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'REGIME_RAPATRIEMENT';
    protected $primaryKey       = 'CODE_REGIME_RAPATRIEMENT';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\RegimeRapatriementEntity::class; // 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'CODE_REGIME_RAPATRIEMENT',
        'LIBELLE_REGIME',
        'TYPE_OPERATION',
        'DELAI_RAPATRIEMENT',
        'REFERENCE_ARRETE',
        'DATE_ARRETE',
        'ACTI'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

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