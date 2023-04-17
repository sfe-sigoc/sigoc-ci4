<?php

namespace App\Libraries\Concrete\RegimeRapatriements;

use App\Libraries\Strategy\_codeRegimeRapatriement;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Traits\TraitBase;
use App\Models\DomiciliationModel;
use App\Libraries\Concrete\DemandeDomiciliations\DomiciliationDemDom;
use App\Libraries\Strategy\_listeDemDoms;

class DomiciliationRegimeRapatriement extends RequeteBase implements _codeRegimeRapatriement, _listeDemDoms
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

    public function _codeRegimeRapatriement($CODE_REGIME_RAPATRIEMENT, array $array = null)
    {
        $demandes = new DemDomRegimeRapatriement();
        $listeDemandes = $demandes->_codeRegimeRapatriement($CODE_REGIME_RAPATRIEMENT, $array);
        return $this->_listeDemDomsExiste($listeDemandes, $array);
    }

    public function _listeDemDomsExiste($listeDemandes = null, array $array = null)
    {
        if (isset($listeDemandes) && !empty($listeDemandes)) {
            return $this->_listeDemDoms($listeDemandes, $array);
        }
        return null;
    }

    public function _listeDemDoms($listeDemandes, array $array = null)
    {
        $array1 = array();
        $demandes = new DomiciliationDemDom();
        foreach ($listeDemandes as $demande)
            // $array1 = array_merge($array1, $demandes->_idDemandeDomiciliation($demande->ID_DEMANDE_DOMICILIATION, $array));
            array_push($array1, $demandes->_idDemandeDomiciliation($demande->ID_DEMANDE_DOMICILIATION, $array));
        return array_filter($array1);
    }
}
