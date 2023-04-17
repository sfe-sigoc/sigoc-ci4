<?php

namespace App\Models;

use CodeIgniter\Model;

class ECARTDAUDETAILSModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ECART_DAU_DETAILS';
    protected $primaryKey       = 'ID_ECART_DETAIL';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\ECARTDAUDETAILSEntity::class; // 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_ECART_DETAIL',
        'ID_ECART_DAU',
        'DAU_NUMERO',
        'MONTANT_DAU',
        'DAU_DATE_LIQUIDATION',
        'DEVISE_DAU',
        'TAUX_CHANGE',
        'DATE_TAUX',
        'DAU_TYPE',
        'IMP_NOM',
        'EXP_NOM',
        'IMP_NIF',
        'EXP_NIF'
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