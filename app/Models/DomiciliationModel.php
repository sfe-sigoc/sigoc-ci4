<?php

namespace App\Models;

use CodeIgniter\Model;

class DomiciliationModel extends Model
{
    protected $table         = 'DOMICILIATION';
    protected $DBGroup       = 'default';
    protected $primaryKey       = 'NUMERO_DOMICILIATION';
    protected $useSoftDeletes   = false;
    protected $returnType    = \App\Entities\DomiciliationEntity::class;
    protected $allowedFields = [
        'NUMERO_DOMICILIATION',
        'CODE_UNITE',
        'CODE_STATUT',
        'ID_DEMANDE_DOMICILIATION',
        'DATE_MODIFICATION',
        'QUANTITE',
        'MONTANT_GLOBAL',
        'NUMERO_DAU',
        'DATE_EMBARQUEMENT',
        'OBSERVATIONS',
        'DATE_CREATION_DOMICILIATION',
        'DATE_RAPATRIEMENT',
        'CHEMIN_PIECE_DOUANE',
        'LOGIN_USER',
        'RETARD',
        'DATE_PREVU_RAPATRIEMENT',
        'MONTANT_RAPATRIEMENT',
        'TYPE_DEMANDE',
        'DATE_APUREMENT',
        'CODE_BANQUES_APUREMENT',
        'QUANTITE_AVANT',
        'MONTANT_AVANT',
        'NB_RELANCE',
        'NUMERO_COMPTE_PERCEPTION',
        'MONTANT_DAU',
        'DEVISE_DAU',
        'COURS_DEVISE',
        'MODIF_COUNT',
        'MONTANT_PRECEDENT',
        'DEVISE_PRECEDENT',
        'REF_LOCAL_DOC',
        'REF_ETR_DOC',
        'DATE_RECEPTION_DOC',
        'QR_KEY_ATTESTATION',
        'APURER_PAR_TRANSACTION',
        'RQ_APUREMENT',
        'RQ_APUREMENT_SAISIE',
        'RQ_APUREMENT_LOGIN',
        'DEPASSEMENT_AUTORISE',
        'DEPASSEMENT_OBSERVATIONS',
        'COURS_UPD',
        'SCAN_DOC',
        'APU_IMPORT_SANS_DAU',
        'DATE_AUT_APU_IMP_SANS_DAU',
        'APU_PAR_SCAN_DAU',
        'NUM_LETTRE_APU_SANS_DAU',
        'SCAN_APU_SANS_DAU',
        'NIF_APUREMENT',
        'NUM_DOM_TRIANGLE',
        'LOGIN_APU_SANS_DAU',
        'DATE_ECHEANCE_LIVRAISON',
        'RETARD_CUMUL',
        'SCAN_REGUL_INFRACTION',
        'INFRACTION_SANS_AMENDE',
        'PEN_REGLE_INFRACTION',
        'AMENDE_PAYER',
        'REMARQUES',
        'RQ_APUREMENT_SCAN',
        'SCAN_BL',
        'DEPASSEMENT_SCAN',
        'EST_RML_PARTIEL',
        'RETARD_MAJ',
        'DROIT_RAPAT',
        'STATE_COVID',
        'NEGI_MONTANT_PAIEMENT',
        'NEGI_COURS',
        'NEGI_MONTANT',
        'NEGI_MONTANT_PRECEDENT',
        'NEGI_DEVISE_PRECEDENT',
        'NEGI__PAIEMENT',
        'BL__UPLOAD',
        'BL_LOGIN_UPLOAD',
        'BL_RETARD_ENVOI',
        'SCAN_PROROGATION',
        'ARRETE_80P',
        'TAUX_RAPAT_AV80P',
        'PRESCRIT',
        'DROIT_RAPAT_SUPPL',
        'EST_PT',
        'PT_MOTIF',
        'PT_SCAN',
        'PT_LOGIN',
        'DAU_TOTAL_MGA',
        'MONTANT_CESSION'
    ];
    protected $useTimestamps = true;
}