<?php

namespace App\Libraries\Concrete\Societes;


use App\Libraries\Strategy\_numeroDomiciliation;
use App\Libraries\Traits\TraitBase;
use App\Models\DomiciliationModel;
use App\Libraries\Abstrait\RequeteBase;


class FindAllDomiciliation extends RequeteBase implements _numeroDomiciliation
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

    public function __construct()
    {
        parent::__construct(DomiciliationModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION_DOMICILIATION');
    }
    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $array1 = ['NUMERO_DOMICILIATION' => $NUMERO_DOMICILIATION];
        $array1 = array_merge($array1,  $this->_extract($array)); // $this->_extract($array));
        return  $this->_findall($array1);
    }
}
