<?php

namespace App\Models;

use CodeIgniter\Model;

class DISPENSEModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'DISPENSE';
    protected $primaryKey       = 'ID_DISPENSE';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\DauEntity::class; //'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_DISPENSE',
        'CODE_MINISTERE',
        'CODE_STATUT',
        'CODE_GROUPE',
        'CODE_DEVISE',
        'NIF',
        'NUM_STATISTIQUE',
        'NUMAUTORISATION_MINTUTELLE',
        'DATEAUTORISATION_MINTUTELLE',
        'NUMERO_FACTURE',
        'DATE_FACTURE',
        'MONTANT_FACTURE',
        'OBSERVATIONS_REGLEMENTATION',
        'NUMERO_FICHE',
        'DATE_FICHE',
        'AVIS_AGENT',
        'DATE_AVIS_AGENT',
        'AVIS_SSOC',
        'DATE_AVIS_SSOC',
        'AVIS_DOF',
        'DATE_AVIS_DOF',
        'AVIS_DGT',
        'DATE_AVIS_DGT',
        'NUMERO_REPONSE',
        'DATE_REPONSE',
        'AVIS_DOUANE',
        'DATE_AVIS_DOUANE',
        'CHEMIN_FACTURE',
        'CHEMIN_AUTORISATION',
        'CHEMIN_DAU',
        'CHEMIN_DEMANDE',
        'LOGIN_UTILISATEUR',
        'DATE_CREATION',
        'DATE_MODIFICATION',
        'CODE_PAYS_DEMANDE',
        'AUTORISATEUR',
        'DATE_ATTRIBUTION_DIVISION',
        'CODE_STATUT_AGENT',
        'CODE_STATUT_SSOC',
        'CODE_STATUT_DOF',
        'CODE_STATUT_DGT',
        'HASH_CODE',
        'ACCEPT_PERCEPTION',
        'DATE_ACCEPT_PERCEPTION',
        'LOGIN_ACCEPT_PERCEPTION',
        'NUMERO_COMPTE_PERCEPTION',
        'CHEMIN_COLISAGE',
        'CHEMIN_AUTRES_PIECES',
        'ID_MOTIF_DISPENSE',
        'ID_PARTICULIER',
        'AUTRES_MOTIFS',
        'COMPLEMENT',
        'ACTIF',
        'AGENT_TRAITANT',
        'CHEMIN_LETTRE_SORTIE',
        'CHEMIN_LETTRE_FICHE_SORTIE',
        'NOM_SOCIETE_BENEFICIAIRE',
        'AGENT_ASSIGNE',
        'DATE_ASSIGNATION_AGENT',
        'USER_ASSIGNANT',
        'AVIS_DIVISION',
        'DATE_AVIS_DIVISION',
        'CODE_STATUT_DIVISION',
        'DATE_VALIDATION',
        'RETOUR_DIVISION',
        'NB_COMPLEMENT',
        'NB_COMPLEMENT_DMD',
        'JUSTIF_AGENT',
        'DATE_DMD_COMPL',
        'SUIVI_APUREMENT',
        'LOGIN_VALIDATEUR',
        'SCAN_DAU_RETOUR',
        'LOGIN_USER_UPLOAD_DAU_RETOUR',
        'DATE_SCAN_DAU_RETOUR'
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