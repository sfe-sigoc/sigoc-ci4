<?php

namespace App\Models;

use CodeIgniter\Model;

class DEMANDEAUTORISATIONModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'DEMANDE_AUTORISATION';
    protected $primaryKey       = 'ID_DEMANDE';
    protected $returnType       = \App\Entities\DEMANDEAUTORISATIONEntity::class; //'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_DEMANDE',
        'NUMERO_STATISTIQUE',
        'NUMERO_COMPTE',
        'CODE_GROUPE',
        'CODE_STATUT',
        'CODE_TYPE_DEMANDE',
        'REFERENCE_DEMANDE',
        'OBSERVATIONS',
        'DONNEUR_ORDRE',
        'PAYS_DONNEUR_ORDRE',
        'ADRESSE_DONNEUR_ORDRE',
        'COMPTE_BANCAIRE_DONNEUR_ORDRE',
        'LOGIN_USER',
        'DATE_CREATION',
        'DATE_MODIFICATION',
        'OBJET',
        'CHEMIN_SWIFT',
        'CHEMIN_AVIS_CREDIT',
        'REFERENCE_SSOC',
        'DATE_SSOC',
        'CHEMIN_CONTRAT',
        'AVIS_DGT',
        'AVIS_DOF',
        'AVIS_SG',
        'AVIS_MFB',
        'AVIS_SSOC',
        'CODE_STATUT_DGT',
        'CODE_STATUT_DOF',
        'CODE_STATUT_SG',
        'CODE_STATUT_MFB',
        'CODE_STATUT_SSOC',
        'DATE_ATTRIBUTION_DIVISION',
        'DATE_AVIS_DGT',
        'DATE_AVIS_DOF',
        'DATE_AVIS_SG',
        'DATE_AVIS_MFB',
        'DATE_AVIS_SSOC',
        'CODE_AGENCE',
        'AGENCE_CODE_BANQUE',
        'HASH_CODE',
        'AGENT_TRAITANT',
        'DATE_AVIS_AGENT',
        'CODE_STATUT_AGENT',
        'AVIS_AGENT',
        'NIF'
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