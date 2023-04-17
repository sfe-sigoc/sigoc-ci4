<?php

namespace App\Libraries\Concrete\RegimeRapatriements;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_codeRegimeRapatriement;
use App\Libraries\Traits\TraitBase;
use App\Models\RegimeRapatriementModel;

class FindAllRegimeRapatriement extends RequeteBase implements _codeRegimeRapatriement
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
    function _codeRegimeRapatriement($CODE_REGIME_RAPATRIEMENT, array $array = null)
    {
        $array1 = ['CODE_REGIME_RAPATRIEMENT' => $CODE_REGIME_RAPATRIEMENT];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findAll($array1);
    }
}