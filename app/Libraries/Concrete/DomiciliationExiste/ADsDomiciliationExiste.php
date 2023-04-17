<?php

namespace App\Libraries\Concrete\DomiciliationExiste;

use App\Libraries\Concrete\Domiciliations\ACsDomiciliation;
use App\Libraries\Concrete\Domiciliations\ADsDomiciliation;
use App\Libraries\Strategy\_domiciliationExiste;

class ADsDomiciliationExiste implements _domiciliationExiste
{
    public function _domiciliationExiste($domiciliation = null, array $array = null)
    {
        if (isset($domiciliation)) {
            $avisDeDebits = new ADsDomiciliation();
            return $avisDeDebits->_numeroDomiciliation($domiciliation->NUMERO_DOMICILIATION, $array);
        }
        return null;
    }
}
