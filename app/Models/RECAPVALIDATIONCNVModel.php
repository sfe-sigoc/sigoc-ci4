<?php

namespace App\Models;

use CodeIgniter\Model;

class RECAPVALIDATIONCNVModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'RECAP_VALIDATION_CNV';
    protected $primaryKey       = 'ID_RECAP_VALIDATION_CNV';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\RECAPVALIDATIONCNVEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_RECAP_VALIDATION_CNV',
        'REFERENCE_VALIDATION',
        'DATE_VALIDATION',
        'USER_VALIDATION',
        'ETAT_RECAP_PATH',
        'USER_SAISIE',
        'DATE_SAISIE'
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