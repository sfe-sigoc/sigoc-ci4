<?php

namespace App\Libraries\Concrete\DomiciliationExiste;

use app\Libraries\Concrete\RegimeRapatriements\ApurementDomiciliation;
use App\Libraries\Strategy\_domiciliationExiste;

class ApurementDomiciliationExiste implements _domiciliationExiste
{
    public function _domiciliationExiste($domiciliation = null, array $array = null)
    {
        if (isset($domiciliation)) {
            $apurements = new ApurementDomiciliation();
            return $apurements->_numeroDomiciliation($domiciliation->NUMERO_DOMICILIATION, $array);
        }
        return null;
    }
}
