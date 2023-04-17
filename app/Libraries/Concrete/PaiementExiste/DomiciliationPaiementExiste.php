<?php

namespace App\Libraries\Concrete\PaiementExiste;

use App\Libraries\Concrete\Societes\FirstDomiciliation;
use App\Libraries\Strategy\_paiementExiste;

class DomiciliationPaiementExiste implements _paiementExiste
{
    public function _paiementExiste($paiement = null, array $array = null)
    {
        if (isset($paiement)) {
            $domiciliation = new FirstDomiciliation();
            return $domiciliation->_numeroDomiciliation($paiement->NUMERO_DOMICILIATION, $array);
        }
        return null;
    }
}
