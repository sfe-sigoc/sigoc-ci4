<?php

namespace App\Libraries\Concrete\RegimeRapatriements;

use App\Libraries\Concrete\DemandeDomiciliations\CompteBancaireDemDom;
use App\Libraries\Traits\TraitBase;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_codeRegimeRapatriement;
use App\Libraries\Strategy\_listeDemDoms;
use App\Models\CompteBancaireModel;

class CompteBancaireRegimeRapatriement extends RequeteBase implements _codeRegimeRapatriement, _listeDemDoms
{

    use TraitBase;

    const FILTRE_RECHERCHE = [
        'CLOTURER',
        'VALIDE_BANQUE',
        'ANNEE'
    ];

    public function __construct()
    {
        parent::__construct(CompteBancaireModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION');
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
        $demandes = new CompteBancaireDemDom();
        foreach ($listeDemandes as $demande)
            $array1 = array_merge($array1, $demandes->_idDemandeDomiciliation($demande->ID_DEMANDE_DOMICILIATION, $array));
        return array_unique(array_filter($array1));
    }
}
