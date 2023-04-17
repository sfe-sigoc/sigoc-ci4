<?php

namespace App\Models;

use CodeIgniter\Model;

class AvisDeDebitModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'AVIS_DE_DEBIT';
    protected $primaryKey       = 'REFERENCE_AVIS_DEBIT';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\AvisDeDebitEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'REFERENCE_AVIS_DEBIT',
        'CODE_DEVISE',
        'CODE_BANQUE',
        'CODE_AGENCE',
        'NUMERO_COMPTE',
        'MONTANT',
        'DATE_AVIS_DEBIT',
        'DATE_DE_VALEUR',
        'COURS',
        'LOGIN_USER',
        'DONNEUR_ORDRE',
        'CONTRE_VALEUR_MGA',
        'MONTANT_PAIEMENT',
        'MONTANT_RESTANT',
        'NUMERO_STAT',
        'DATE_MODIFICATION',
        'AUTORISATION_SSOC',
        'SCAN',
        'NIF',
        'IS_FAKE_SCAN',
        'FAKE_SCAN_DONE',
        'RETOUR_FONDS',
        'RETOUR_FONDS_AC',
        'RETOUR_FONDS_SCAN_AC',
        'RETOUR_FONDS_EXPL',
        'EN_FAVEUR_DE',
        'RQ_NON_UTILISATION',
        'SCAN_NON_UTILISATION',
        'COURS_BFM '
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