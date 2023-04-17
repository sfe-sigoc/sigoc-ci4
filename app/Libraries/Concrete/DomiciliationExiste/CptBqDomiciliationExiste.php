<?php

namespace App\Libraries\Concrete\DomiciliationExiste;

use App\Libraries\Concrete\DemDomExiste\CompteBancaireDemDomExiste;
use App\Libraries\Strategy\_domiciliationExiste;

class CptBqDomiciliationExiste implements _domiciliationExiste
{
    public function _domiciliationExiste($domiciliation = null, array $array = null)
    {
        if (isset($domiciliation)) {
            $compte = new CompteBancaireDemDomExiste();
            return $compte->_demDomExiste($domiciliation->NUMERO_DOMICILIATION, $array);
        }
        return null;
    }
}
