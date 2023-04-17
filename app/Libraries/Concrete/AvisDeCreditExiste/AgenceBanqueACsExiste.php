<?php

namespace App\Libraries\Concrete\AvisDeCreditExiste;

use App\Libraries\Concrete\Agences\FirstAgenceBanque;
use App\Libraries\Concrete\Banques\FirstBanque;
use App\Libraries\Strategy\_avisDeCreditExiste;

class AgenceBanqueACsExiste implements _avisDeCreditExiste
{
    public function _avisDeCreditExiste($avis = null, array $array = null)
    {
        if (isset($avis)) {
            $agences = new FirstAgenceBanque();
            return $agences->_AgenceBanque($avis->AGENCE_CODE_BANQUE, $avis->CODE_AGENCE, $array);
        }
        return null;
    }
}
