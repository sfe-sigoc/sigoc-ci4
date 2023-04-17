<?php

namespace App\Libraries\Concrete\DemDomExiste;

use App\Libraries\Concrete\Banques\FirstBanque;
use App\Libraries\Strategy\_demDomExiste;

class BanqueDemDomExiste implements _demDomExiste
{
    public function _demDomExiste($demande = null, array $filtreBanque = null)
    {
        if (isset($demande)) {
            $banques = new FirstBanque();
            return $banques->_Banque($demande->AGENCE_CODE_BANQUE, $filtreBanque);
        }
        return null;
    }
}
