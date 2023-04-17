<?php

namespace App\Libraries\Concrete\DemandeDomiciliations;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_idDemandeDomiciliation;
use App\Libraries\Traits\TraitBase;
use App\Models\DomiciliationModel;

class DomiciliationDemDom extends RequeteBase implements _idDemandeDomiciliation
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
    public function _idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION, array $filtreDom = null)
    {
        $array1 = ['ID_DEMANDE_DOMICILIATION' => $ID_DEMANDE_DOMICILIATION];
        $array1 = array_merge($array1, $this->_extract($filtreDom));
        return $this->_first($array1);
    }
}
