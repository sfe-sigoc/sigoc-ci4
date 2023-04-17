<?php

namespace App\Models;

use CodeIgniter\Model;

class APUREMENTANNULEModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'APUREMENT_ANNULE';
    protected $primaryKey       = 'ID_APU_ANNULE';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\APUREMENTANNULEEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_APU_ANNULE',
        'NUMERO_AVIS_CREDIT',
        'NUMERO_DOMICILIATION',
        'MONTANT_APUREMENT',
        'DATE_APUREMENT',
        'LOGIN_USER',
        'RETARD',
        'BANQUE_DEMANDEUR',
        'DATE_ANNULATION',
        'BANQUE_APUREUR',
        'DEPASSE_AUTORISATION',
        'TAUX_PARITE',
        'TAUX_PARITE_TMP'
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