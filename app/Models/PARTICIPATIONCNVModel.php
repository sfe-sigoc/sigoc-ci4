<?php

namespace App\Models;

use CodeIgniter\Model;

class PARTICIPATIONCNVModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'PARTICIPATION_CNV';
    protected $primaryKey       = 'ID_PARTICIPATION_CNV';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\PARTICIPATIONCNVEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_PARTICIPATION_CNV',
        'NUMERO_DOMICILIATION',
        'CODE_AGENCE',
        'AGENCE_CODE_BANQUE',
        'NIF',
        'CODE_DEVISE',
        'COURS_DEVISE',
        'CODE_UNITE',
        'MONTANT_GLOBAL',
        'QUANTITE_DEMANDE',
        'QUANTITE_REEL',
        'CODE_MODE_PAIEMENT',
        'DATE_PAIEMENT',
        'DATE_SAISIE',
        'MONTANT_PAYE',
        'CODE_STATUT',
        'LOGIN_USER',
        'MONTANT_APAYER',
        'PARTICIPATION',
        'REFERENCE_PAIEMENT',
        'MONTANT_PAYE_DOM',
        'SCAN',
        'ID_SECT_ACTIVITE',
        'USER_VALID',
        'DATE_VALID',
        'ATTESTATION_PAIEMENT_PATH',
        'ID_RECAP_VALIDATION_CNV',
        'QR_KEY_ATTESTATION'
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