<?php

namespace App\Libraries\Concrete\DomiciliationExiste;

use App\Libraries\Concrete\Domiciliations\ApurementDomiciliation;
use App\Libraries\Concrete\Domiciliations\PaiementsDomiciliation;
use App\Libraries\Strategy\_domiciliationExiste;

class PaiementDomiciliationExiste implements _domiciliationExiste
{
    public function _domiciliationExiste($domiciliation = null, array $array = null)
    {
        if (isset($domiciliation)) {
            $apurements = new PaiementsDomiciliation();
            return $apurements->_numeroDomiciliation($domiciliation->NUMERO_DOMICILIATION, $array);
        }
        return null;
    }
}
