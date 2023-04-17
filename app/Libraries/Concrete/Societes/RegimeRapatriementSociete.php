<?php

namespace App\Libraries\Concrete\Societes;

use App\Libraries\Traits\TraitBase;
use App\Libraries\Strategy\_Societe;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\RegimeRapatriements\FirstRegimeRapatriement;
use App\Libraries\Strategy\_listeDemDoms;
use App\Models\RegimeRapatriementModel;

class RegimeRapatriementSociete extends RequeteBase implements _Societe, _listeDemDoms
{
    use TraitBase;
    const FILTRE_RECHERCHE = [
        'ACTIF',
        'ANNEE'
    ];
    public function __construct()
    {
        // parent::setModelBase(PaiementImportModel::class);
        parent::__construct(RegimeRapatriementModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_ARRETE');
    }
    public function _Societe($NIF, array $array = null)
    {
        $demandes = new DemDomSociete();
        $listeDemandeDomiciliations = $demandes->_Societe($NIF, $array);
        return $this->_listeDemDomsExiste($listeDemandeDomiciliations, $array);
    }
    public function _listeDemDomsExiste($listeDemandeDomiciliations = null, array $array = null)
    {
        if (isset($listeDemandeDomiciliations) && !empty($listeDemandeDomiciliations)) {
            return $this->_listeDemDoms($listeDemandeDomiciliations, $array);
        }
        return null;
    }
    public function _listeDemDoms($listeDemandeDomiciliations, array $array = null)
    {
        $regimes = new FirstRegimeRapatriement();
        $array1 = array();
        foreach ($listeDemandeDomiciliations as $demande)
            $array1 = array_merge($array1, $regimes->_codeRegimeRapatriement($demande->CODE_REGIME_RAPATRIEMENT, $array));
        return array_filter($array1);
    }
}
