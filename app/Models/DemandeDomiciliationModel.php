<?php

namespace App\Models;

use CodeIgniter\Model;

class DemandeDomiciliationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'DEMANDE_DOMICILIATION';
    protected $primaryKey       = 'ID_DEMANDE_DOMICILIATION';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\DemandeDomiciliationEntity::class;
    protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_DEMANDE_DOMICILIATION',
        'CODE_STATUT',
        'CODE_DEVISE',
        'NUMERO_STATISTIQUE',
        'CODE_UNITE',
        'NUMERO_COMPTE',
        'CODE_AGENCE',
        'AGENCE_CODE_BANQUE',
        'CODE_INCOTERM',
        'CODE_REGIME_RAPATRIEMENT',
        'CODE_MODALITE_PAIEMENT',
        'REFERENCE_FACTURE',
        'DATE_FACTURE',
        'TYPE_DEMANDE',
        'NOM_FFRN_ACH',
        'NUM_COMPTE_FRN_ACH',
        'CODE_DEVISE_FRN_ACH',
        'ADRESSE_FRN_ACH',
        'QUANTITE_DEMANDE',
        'MONTANT_GLOBAL',
        'PAYS_DESTINATAIRE',
        'DATE_CREATION_DEMANDE',
        'CHEMIN_FACTURE',
        'PRIX_FOB',
        'MONTANT_FRET',
        'LOGIN_USER',
        'DATE_STATUT',
        'OBSERVATIONS',
        'MONTANT_ASSURANCE',
        'CODE_AGENCE_VALIDATION',
        'DATE_REGLEMENT',
        'DEVISE_FRET',
        'DEVISE_ASSURANCE',
        'NIF',
        'CODE_AGENCE_SAISIE',
        'EST_CREATION_OPERATEUR',
        'NO_PAIEMENT_ETR',
        'DESIGNATION_PRODUIT',
        'COURS_FRET',
        'COURS_ASSURANCE'
    ];

    // Dates
    protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
}