<?php

namespace App\Libraries\Concrete\PaiementExiste;

use App\Libraries\Concrete\Domiciliations\DemDomDomiciliation;
use App\Libraries\Concrete\Domiciliations\FirstDomiciliation;
use App\Libraries\Strategy\_paiementExiste;

class DemDomPaiementExiste implements _paiementExiste
{
    public function _paiementExiste($paiement = null, array $array = null)
    {
        if (isset($paiement)) {
            $demandes = new DemDomDomiciliation();
            return $demandes->_numeroDomiciliation($paiement->NUMERO_DOMICILIATION, $array);
        }
        return null;
    }
}
