<?php

namespace App\Models;

use CodeIgniter\Model;

class PenalitesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'DECRET_PENALITE';
    protected $primaryKey       = 'CODE_MODE_CALCUL';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\PenalitesEntity::class; //'array';
    protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'CODE_MODE_CALCUL',
        'NOMBRE_JOUR_RETARD_INF',
        'NOMBRE_JOUR_RETARD_SUP',
        'POURCENTAGE_PENALITE',
        'ACTIF',
        'DATE_DECRET',
        'NUMERO_DECRET'
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