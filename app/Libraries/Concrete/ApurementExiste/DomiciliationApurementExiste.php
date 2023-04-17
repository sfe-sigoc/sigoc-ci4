<?php

namespace App\Libraries\Concrete\Apurements;

use App\Libraries\Concrete\AvisDeCredits\FirstAvisDeCredit;
use App\Libraries\Concrete\Societes\FirstDomiciliation;
use App\Libraries\Strategy\_apurementExiste;

class DomiciliationApurementExiste implements _apurementExiste
{
    public function _apurementExiste($apurement = null, array $array = null)
    {
        if (isset($apurement)) {
            $domiciliation = new FirstDomiciliation();
            return $domiciliation->_numeroDomiciliation($apurement->NUMERO_DOMICILIATION, $array);
        }
        return null;
    }
}
