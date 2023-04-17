<?php

namespace App\Models;

use CodeIgniter\Model;

class CessionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'AVIS_CESSION';
    protected $primaryKey       = 'ID_CESSION';
    // protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\CessionEntity::class; //'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_CESSION',
        'REF_AVIS',
        'NUMERO_AVIS_CREDIT',
        'CODE_DEVISE',
        'DATE_CESSION',
        'MONTANT_CEDE',
        'LOGIN_USER',
        'COURS',
        'CONTRE_VALEUR_MGA',
        'SCAN',
        'DATE_CREATION'
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
