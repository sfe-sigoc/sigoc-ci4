<?php

namespace App\Models;

use CodeIgniter\Model;

class DEVISEModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'DEVISE';
    protected $primaryKey       = 'CODE_DEVISE';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\DEVISEEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'CODE_DEVISE',
        'DESIGNATION_DEVISE',
        'SYMBOLE_DEVISE',
        'ACTIF',
        'CODE_NUMERIQUE',
        'EST_VISA',
        'COTER',
        'TAUX_COURANT_ARIARY'
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