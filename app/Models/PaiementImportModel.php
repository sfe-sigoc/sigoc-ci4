<?php

namespace App\Models;

use CodeIgniter\Model;

class PaiementImportModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'PAIEMENT_IMPORT';
    protected $primaryKey       = 'ID_PAIEMENT';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\PaiementImportEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_PAIEMENT',
        'REFERENCE_AVIS_DEBIT',
        'NUMERO_DOMICILIATION',
        'REFERENCE_TRANSFERT',
        'MONTANT_PAIEMENT',
        'DATE_PAIEMENT',
        'LOGIN_USER',
        'DATE_TRANSFERT',
        'POURCENTAGE_ACOMPTE',
        'EST_ACOMPTE',
        'INFRACTION',
        'BANQUE_PAYEUR',
        'DEPASSE_AUTORISATION',
        'TAUX_PARITE',
        'TAUX_PARITE_TMP',
        'SCAN_CNON_INFRACTION',
        'LOGIN_CNON_INFRACTION',
        'DATE_CNON_INFRACTION',
        'MOTIF_CNON_INFRACTION'
    ];

    // s
    protected $useTimestamps = false;
    protected $Format    = 'time';
    protected $createdField  = 'created_at';
    protected $updField  = 'upd_at';
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
    protected $beforeUp   = [];
    protected $afterUp    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}