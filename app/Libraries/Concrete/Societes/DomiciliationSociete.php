<?php

namespace App\Libraries\Concrete\Societes;

use App\Libraries\Strategy\_Societe;
use App\Libraries\Traits\TraitBase;
use App\Models\DomiciliationModel;
use App\Libraries\Concrete\Agences\DemDomAgenceBanque;
use App\Libraries\Concrete\DemandeDomiciliations\DomiciliationDemDom;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_listeDemDoms;

class DomiciliationSociete extends RequeteBase implements _Societe, _listeDemDoms
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

    public function _Societe($NIF, array $array = null)
    {
        $demandeDOMs = new DemDomSociete();
        $listeDemDoms = $demandeDOMs->_Societe($NIF, $array);
        return $this->_listeDemDomsExiste($listeDemDoms, $array);
    }

    public function _listeDemDomsExiste(array $listeDemDoms = null, array $array = null)
    {
        if (isset($listeDemDoms) && !empty($listeDemDoms))
            return $this->_listeDemDoms($listeDemDoms, $array);
        return null;
    }

    public function _listeDemDoms($listeDemDoms, array $array = null)
    {
        $array1 = array();
        $demandeDOMs = new DomiciliationDemDom();
        foreach ($listeDemDoms as $demande) {
            array_push($array1, $demandeDOMs->_idDemandeDomiciliation($demande->ID_DEMANDE_DOMICILIATION, $array));
        }
        return array_filter($array1);
    }
}
