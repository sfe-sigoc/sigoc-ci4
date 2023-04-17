<?php

namespace App\Libraries\Concrete\DomiciliationExiste;

use App\Libraries\Concrete\Domiciliations\CessionDomiciliation;
use App\Libraries\Strategy\_demDomExiste;
use App\Libraries\Strategy\_domiciliationExiste;

class CessionDomiciliationExiste implements _domiciliationExiste
{
    public function _domiciliationExiste($domiciliation = null, array $array = null)
    {
        if (isset($domiciliation)) {
            $cessions = new CessionDomiciliation();
            return $cessions->_numeroDomiciliation($domiciliation->NUMERO_DOMICILIATION, $array);
        }
        return null;
    }
}
