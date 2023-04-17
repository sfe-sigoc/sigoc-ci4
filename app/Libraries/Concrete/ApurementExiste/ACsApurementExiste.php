<?php

namespace App\Libraries\Concrete\Apurements;

use App\Libraries\Concrete\AvisDeCredits\FirstAvisDeCredit;
use App\Libraries\Strategy\_apurementExiste;

class ACsApurementExiste implements _apurementExiste
{
    public function _apurementExiste($apurement = null, array $array = null)
    {
        if (isset($apurement)) {
            $avis = new FirstAvisDeCredit();
            return $avis->_numeroAvisDeCredit($apurement->NUMERO_AVIS_CREDIT, $array);
        }
        return null;
    }
}
