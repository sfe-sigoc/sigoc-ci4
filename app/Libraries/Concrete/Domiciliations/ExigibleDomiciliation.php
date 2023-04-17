<?php

namespace App\Libraries\Concrete\Domiciliations;

use App\Libraries\Concrete\RegimeRapatriements\DomiciliationRegimeRapat;
use App\Libraries\Concrete\RegimeRapatriements\DomiciliationRegimeRapatriement;
use App\Libraries\Concrete\Societes\FirstDomiciliation;
use App\Libraries\Strategy\_numeroDomiciliation;
use App\Libraries\Traits\TraitBase;
use CodeIgniter\I18n\Time;
use App\Libraries\Strategy\_domiciliationExiste;

class ExigibleDomiciliation implements _numeroDomiciliation, _domiciliationExiste
{

    use TraitBase;
    const FILTRE_RECHERCHE = [
        'TYPE_DEMANDE',
        'CODE_STATUT',
        'ANNEE',
        'EST_PT',
        'APU_PAR_SCAN_DAU',
        'APU_IMPORT_SANS_DAU',
        'COURS_UPDATED',
        'DEPASSEMENT_AUTORISE',
        'APURER_PAR_TRANSACTION',
        'MODIF_COUNT',
        'NB_RELANCE',
        'INFRACTION_SANS_AMENDE',
        'RETARD_CUMUL'
    ];
    const STATUT = array(
        'VAL',
        'EMB',
        'RPP'
    );
    const TYPE_DEMANDE = array(
        'E',
        'N'
    );
    public function __construct()
    {
    }

    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $domiciliations = new FirstDomiciliation();
        $domiciliation = $domiciliations->_numeroDomiciliation($NUMERO_DOMICILIATION, $array);
        return $this->_domiciliationExiste($domiciliation, $array);
    }

    public function _domiciliationExiste($domiciliation = null, array $array = null)
    {
        if (in_array($domiciliation->CODE_STATUT, self::STATUT)) {
            echo '<BR> Statut OK';
            if (intval($domiciliation->APURER_PAR_TRANSACTION) == 0) {
                echo '<BR> PAR_TRANSACTION OK';
                if (in_array($domiciliation->TYPE_DEMANDE, self::TYPE_DEMANDE)) {
                    $datePrevu = str_To_Datetime($domiciliation->DATE_PREVU_RAPATRIEMENT);
                    $regimeRapatDomiciliation = new DomiciliationRegimeRapatriement();
                    $regime = $regimeRapatDomiciliation->_numeroDomiciliation($domiciliation->NUMERO_DOMICILIATION);
                    $datePrevu = date_modify($domiciliation->DATE_CREATION_DOMICILIATION, '+' . intval($regime->DELAI_RAPATRIEMENT) . ' day');
                    echo '<BR> TYPE_DEMANDE OK DATE_PREVU_RAPATRIEMENT = ' . $datePrevu->format('d-m-Y') . ' NOW = ' . Time::now();
                    if ($datePrevu < Time::now()) {
                        echo '<BR> DATE_PREVU_RAPATRIEMENT OK';
                        echo 'COURS_DEVISE=' . $domiciliation->COURS_DEVISE . ' GLOBAL = ' . $domiciliation->MONTANT_GLOBAL . ' RAPAT= ' . $domiciliation->MONTANT_RAPATRIEMENT;
                        $global = floatval($domiciliation->MONTANT_GLOBAL);
                        $rapat = is_null($domiciliation->MONTANT_RAPATRIEMENT) ? 0 : floatval($domiciliation->MONTANT_RAPATRIEMENT);
                        $exigibles = ($global - $rapat) * floatval($domiciliation->COURS_DEVISE);
                        echo '<BR>Exigibles = ' . $exigibles;
                        return ((floatval($domiciliation->MONTANT_GLOBAL) - is_null($domiciliation->MONTANT_RAPATRIEMENT) ? 0 : floatval($domiciliation->MONTANT_RAPATRIEMENT))) * floatval($domiciliation->COURS_DEVISE);
                    }
                }
            }
        }
        return 0.0;
    }
}
