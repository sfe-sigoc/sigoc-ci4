<?php

namespace App\Models;

use CodeIgniter\Model;

class AvisDeCreditModel extends Model
{
    //protected $DBGroup = 'group_name';
    protected $table     = 'AVIS_DE_CREDIT';
    protected $primaryKey = 'NUMERO_AVIS_CREDIT'; //'id';

    protected $returnType    = \App\Entities\AvisDeCreditEntity::class;
    protected $useSoftDeletes = false;

    protected $allowedFields = [ //['name', 'email'];
        'NUMERO_AVIS_CREDIT',
        'NUMERO_COMPTE',
        'CODE_AGENCE',
        'AGENCE_CODE_BANQUE',
        'ID_DEMANDE',
        'CODE_TYPE_AVIS',
        'DATE_AVIS_CREDIT',
        'MONTANT_AVIS_CREDIT',
        'DEVISE_AVIS_CREDIT',
        'MONTANT_APUREMENT',
        'MONTANT_RESTANT',
        'DATE_DE_VALEUR',
        'DONNEUR_D_ORDRE',
        'LOGIN_USER',
        'COURS',
        'CONTRE_VALEUR_MGA',
        'EST_CEDER',
        'MONTANT_RESTANT_CESSION',
        'MONTANT_CESSION',
        'DATE_PREVU_CESSION',
        'RETARD_CESSION',
        'NUMERO_STAT',
        'DATE_CESSION_ATTEINT',
        'SWIFT',
        'DATE_MODIFICATION',
        'SCAN',
        'NIF',
        'PASSER_MID',
        'IS_FAKE_SCAN',
        'FAKE_SCAN_DONE',
        'USAGE_ANTERIEUR',
        'MONTANT_USE_ANTERIEUR',
        'VALIDE',
        'COURS_BFM',
        'IGNORE_CESSION',
        'PRESCRIT',
        'APURER_PAR_TRANSACTION',
        'RQ_APUREMENT',
        'RQ_APUREMENT_SAISIE',
        'RQ_APUREMENT_LOGIN',
        'RQ_APUREMENT_SCAN',
        'INFRACTION_SANS_AMENDE',
        'PEN_REGLE_INFRACTION',
        'AMENDE_PAYER',
        'MOTIF_USE_RELIQUAT',
        'CRDOM'
    ];

    protected $useTimestamps = false;
    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';
    // protected $deletedField = 'deleted_at';

    protected $validationRules   = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;
}