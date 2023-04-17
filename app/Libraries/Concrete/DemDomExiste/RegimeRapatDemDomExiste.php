<?php

namespace App\Libraries\Concrete\DemDomExiste;

use App\Libraries\Concrete\RegimeRapatriements\FirstRegimeRapatriement;
use App\Libraries\Strategy\_demDomExiste;

class RegimeRapatDemDomExiste implements _demDomExiste
{
    public function _demDomExiste($demande = null, array $array = null)
    {
        if (isset($demande)) {
            $regimes = new FirstRegimeRapatriement();
            return $regimes->_codeRegimeRapatriement($demande->CODE_REGIME_RAPATRIEMENT, $array);
        }
        return null;
    }
}
