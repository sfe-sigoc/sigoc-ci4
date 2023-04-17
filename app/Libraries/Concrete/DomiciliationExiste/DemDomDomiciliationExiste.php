<?php

namespace App\Libraries\Concrete\DomiciliationExiste;

use App\Libraries\Concrete\DemandeDomiciliations\FirstDemandeDomiciliation;

use App\Libraries\Strategy\_domiciliationExiste;

class DemDomDomiciliationExiste implements _domiciliationExiste
{
    public function _domiciliationExiste($domiciliation = null, array $array = null)
    {
        if (isset($domiciliation)) {
            $demandes = new FirstDemandeDomiciliation();
            return $demandes->_idDemandeDomiciliation($domiciliation->ID_DEMANDE_DOMICILIATION, $array);
        }
        return null;
    }
}
