<?php

namespace App\Models;

use CodeIgniter\Model;

class SocieteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'SOCIETE';
    protected $primaryKey       = 'NIF';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\SocieteEntity::class;
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    protected $allowedFields    = [
        'NIF',
        'CODE_TYPE',
        'CODE_SOCIETE',
        'TELEPHONE',
        'RAISON_SOCIALE',
        'ADRESSE_POSTALE',
        'REGISTRE_DE_COMMERCE',
        'ADRESSE',
        'NOM_POUVOIR_SIGNATAIRE',
        'PRENOM_POUVOIR_SIGNATAIRE',
        'ADRESSE_POUVOIR_SIGNATAIRE',
        'TELEPHONE_POUVOIR_SIGNATAIRE',
        'PAYS_POUVOIR_SIGNATAIRE',
        'FONCTION_POUVOIR_SIGNATAIRE',
        'REGIME',
        'CHEMIN_CIN',
        'CHEMIN_RESIDENCE',
        'CHEMIN_NIF',
        'CODE_FKT',
        'ACTIF',
        'DATE_CREATION',
        'DATE_MODIFICATION',
        'LOGIN_UTILISATEUR',
        'SUSPENDU',
        'DATE_DEBUT_SUSPENSION',
        'PIECE_SUSPENSION',
        'CIN_POUVOIR_SIGNATAIRE',
        'PASSEPORT_POUVOIR_SIGNATAIRE',
        'MAIL_SOCIETE',
        'MAIL_POUVOIR_SIGNATAIRE',
        'NUMERO_AGREEMENT',
        'DATE_AGREEMENT',
        'PIECE_POUVOIR_SIGNATAIRE',
        'EST_ASSOCIATION',
        'TYPE_SUSPENSION',
        'ACTIVITES',
        'CAPITAL_SOCIAL',
        'REMARQUES',
        'TMP_ANTERIEUR',
        'EST_OA',
        'VALIDE_FINEX',
        'CAN_NEGOCE',
        'LOGIN_VALIDATION_FINEX',
        'DATE_VALIDATION_FINEX',
        'LEGAL_DATE_NEE_GERANT',
        'LEGAL_LIEU_NEE_GERANT',
        'LEGAL_SEXE_GERANT',
        'LEGAL_NOM_GERANT',
        'LEGAL_PERE_GERANT',
        'LEGAL_MERE_GERANT',
        'LEGAL_ADRESSE_GERANT',
        'LEGAL_FONCTION_GERANT',
        'LEGAL_CIVILITE_GERANT',
        'DAY_NOTIF',
        'FIRST_NOTIF',
        'ID_CARD_GERANT',
        'ID_NUM_GERANT',
        'ID_DATE_GERANT',
        'ID_LIEU_GERANT',
        'ID_DUPLI_DATE_GERANT',
        'ID_DUPLI_LIEU_GERANT',
        'SCAN_RCS',
        'RCS_INFO',
        'SUSPENDU_EXPORT',
        'SUSPENDU_IMPORT',
        'SUSPENDU_NEGOCE',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    // protected $createdField  ='created_at';
    // protected $updatedField  ='updated_at';
    // protected $deletedField  ='deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
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
