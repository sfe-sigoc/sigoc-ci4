<?php

namespace App\Libraries\Concrete\ListeDemDom;

use App\Libraries\Abstrait\ListeDemDoms;
use App\Libraries\Concrete\RegimeRapatriements\FirstRegimeRapatriement;

class RegimeRapatListeDemDom extends ListeDemDoms
{
    public  function _listeDemDoms($listeDemDoms, array $array = null)
    {
        if (isset($listeDemDoms) && !empty($listeDemDoms)) {
            $array_CODE_REGIME_RAPATRIEMENT = array_unique(array_column($listeDemDoms, 'CODE_REGIME_RAPATRIEMENT'));
            $regimes = new FirstRegimeRapatriement();
            $array_regimes = array_map(fn ($item) => $regimes->_codeRegimeRapatriement($item, $array), $array_CODE_REGIME_RAPATRIEMENT);
            return $array_regimes;
        }
        return null;
    }
}
