<?php

namespace App\Libraries\Concrete\RegimeRapatriements;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\Societes\FirstSociete;
use App\Libraries\Strategy\_codeRegimeRapatriement;
use App\Libraries\Strategy\_listeDemDoms;
use App\Libraries\Traits\TraitBase;
use App\Models\SocieteModel;

class SocieteRegimeRapatriement extends RequeteBase implements _codeRegimeRapatriement, _listeDemDoms
{
    use TraitBase;
    const FILTRE_RECHERCHE = [
        'ACTIF', 'EST_OA', 'VALIDE_FINEX', 'ANNEE'
    ];
    public function __construct()
    {
        parent::__construct(SocieteModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION');
    }
    function _codeRegimeRapatriement($CODE_REGIME_RAPATRIEMENT, array $array = null)
    {
        $demandes = new DemDomRegimeRapatriement();
        $arrayDemDom =
            ['TYPE_DEMANDE' => 'I', 'CODE_STATUT' => 'VAL',    'ANNEE' => '2022'];
        $listeDemDoms = $demandes->_codeRegimeRapatriement($CODE_REGIME_RAPATRIEMENT, $arrayDemDom);
        return $this->_listeDemDomsExiste($listeDemDoms, $array);
    }
    public function _listeDemDomsExiste($listeDemDoms = null, array $array = null)
    {
        if (isset($listeDemDoms) && !empty($listeDemDoms)) {
            return $this->_listeDemDoms($listeDemDoms, $array);
        }
        return null;
    }
    public function _listeDemDoms($listeDemDoms, array $array = null)
    {
        $array1 = array();
        $societes = new FirstSociete();
        foreach ($listeDemDoms as $demande)
            array_push($array1, $societes->_Societe($demande->NIF, $array));
        return array_filter($array1);
    }
}
