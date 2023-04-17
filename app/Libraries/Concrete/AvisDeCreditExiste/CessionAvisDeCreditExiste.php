<?php

namespace App\Libraries\Concrete\AvisDeCreditExiste;

use App\Libraries\Concrete\AvisDeCredits\CessionACs;
use App\Libraries\Strategy\_avisDeCreditExiste;

class CessionAvisDeCreditExiste implements _avisDeCreditExiste
{
    public function _avisDeCreditExiste($avis = null, array $array = null)
    {
        if (isset($avis)) {
            $cessions = new CessionACs();
            return $cessions->_numeroAvisDeCredit($avis->NUMERO_AVIS_CREDIT,  $array);
        }
        return null;
    }
}
