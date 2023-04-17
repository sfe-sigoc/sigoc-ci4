<?php

namespace App\Libraries\Concrete\DomiciliationExiste;

use App\Libraries\Concrete\Domiciliations\ACsDomiciliation;
use App\Libraries\Strategy\_domiciliationExiste;

class ACsDomiciliationExiste implements _domiciliationExiste
{
    public function _domiciliationExiste($domiciliation = null, array $array = null)
    {
        if (isset($domiciliation)) {
            $AvisCredits = new ACsDomiciliation();
            return $AvisCredits->_numeroDomiciliation($domiciliation->NUMERO_DOMICILIATION, $array);
        }
        return null;
    }
}
