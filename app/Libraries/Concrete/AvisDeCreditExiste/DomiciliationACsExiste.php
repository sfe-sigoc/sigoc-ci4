<?php

namespace App\Libraries\Concrete\AvisDeCreditExiste;

use App\Libraries\Concrete\Banques\FirstBanque;
use App\Libraries\Strategy\_avisDeCreditExiste;

class DomiciliationACsExiste implements _avisDeCreditExiste
{
    public function _avisDeCreditExiste($avis = null, array $array = null)
    {
        if (isset($avis)) {
            $banques = new FirstBanque();
            return $banques->_Banque($avis->AGENCE_CODE_BANQUE, $array);
        }
        return null;
    }
}