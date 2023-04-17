<?php

namespace App\Libraries\Concrete\DemDomExiste;

use App\Libraries\Concrete\Agences\FirstAgenceBanque;
use App\Libraries\Strategy\_demDomExiste;

class AgenceBanqueDemDomExiste implements _demDomExiste
{
    public function _demDomExiste($demande = null, array $array = null)
    {
        if (isset($demande)) {
            $agences = new FirstAgenceBanque();
            return $agences->_AgenceBanque($demande->AGENCE_CODE_BANQUE, $demande->CODE_AGENCE, $array);
        }
        return null;
    }
}
