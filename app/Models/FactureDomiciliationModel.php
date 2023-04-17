<?php

namespace App\Models;

use CodeIgniter\Model;

class FactureDomiciliationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'FACTURE_DOMICILIATION';
    protected $primaryKey       = 'REF_FACTURE';
    // protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\FactureDomiciliationEntity::class; //'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'REF_FACTURE',
        'CODE_BANQUE',
        'TYPE_DEMANDE',
        'DATE_FACTURE',
        'DATE_CREATION',
        'NB_FACTURE',
        'DISPO'
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
