<?php

namespace App\Models;

use CodeIgniter\Model;

class NOTIFPENAUTOModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'NOTIF_PEN_AUTO';
    protected $primaryKey       = 'ID_PEN_AUTO';
    // protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = \App\Entities\NOTIFPENAUTOEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ID_PEN_AUTO',
        'NIF',
        'OBJ_NOTIF',
        '_NOTIF',
        'HASH',
        'MONTANT_NON_RAPAT',
        'NB_NON_RAPATL',
        'MONTANT_RETARD',
        'NB_RETARD_RAPAT',
        'MONTANT_NON_APURER',
        'NB_NON_APURER',
        'MONTANT_TRF_NON_APURER',
        'NB_TRF_NON_APURER',
        'MONTANT_TRF_EN_TROP',
        'NB_PAIEMENT_TROP',
        'MONTANT_DEPASSEMENT_ACOMPTE',
        'NB_DEPASSEMENT_ACOMPTE',
        'MONTANT_NEG_SANS_MARGE',
        'NB_NEG_SANS_MARGE',
        'NO_ACCOUNT',
        'REF_NOTIF',
        'SENT',
        '_ENVOI',
        'MAIL_ENVOI',
        'MONTANT_NON_CESSION',
        'NB_NON_CESSION',
        'MONTANT_NON_RAPAT_NEGOCE',
        'NB_NON_RAPAT_NEGOCE',
        'MONTANT_RETARD_NEGOCE',
        'NB_RETARD_NEGOCE',
        'RECAP_NON_RAPAT',
        'RECAP_RETARD',
        'RECAP_NON_APURER',
        'RECAP_TRF_NON_APURER',
        'RECAP_TRF_EN_TROP',
        'RECAP_DEPASSEMENT_ACOMPTE',
        'RECAP_NEG_SANS_MARGE',
        'RECAP_NON_CESSION',
        'RECAP_NON_RAPAT_NEGOCE',
        'RECAP_RETARD_NEGOCE',
        '_CNX_AP_NOTIF',
        'LOGIN_CNX_AP_NOTIF',
        'DEGRE',
        'PREV_REF',
        'PREV_ID',
        'PREV_',
        'NL_IRREG',
        'PV',
        'SCAN_PV',
        '_PV',
        'ETAT_AMENDE',
        'MONTANT_AMENDE',
    ];

    // s
    protected $useTimestamps = false;
    // protected $Format    = 'time';
    // protected $createdField  = 'created_at';
    // protected $updField  = 'upd_at';
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
    protected $beforeUp   = [];
    protected $afterUp    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}