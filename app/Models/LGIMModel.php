<?php

namespace App\Models;

use CodeIgniter\Model;

class LGIMModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'LGIM';
    protected $primaryKey       = 'LGIM_NIF';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\LGIMEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'LGIM_NIF',
        'LGIM_RAISON_SOCIALE',
        'LGIM_STATUT',
        'LGIM_ADRESSE',
        'EXCLURE_STAT_RAPAT'
    ];

    // Dates
    protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
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