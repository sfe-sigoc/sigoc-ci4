<?php

namespace App\Libraries\Concrete\DomiciliationExiste;

use App\Libraries\Concrete\DemandeDomiciliations\SocieteDemDom;

use App\Libraries\Strategy\_domiciliationExiste;

class SocieteDomiciliationExiste implements _domiciliationExiste
{
    public function _domiciliationExiste($domiciliation = null, array $array = null)
    {
        if (isset($domiciliation)) {
            $societes = new SocieteDemDom();
            return $societes->_idDemandeDomiciliation($domiciliation->ID_DEMANDE_DOMICILIATION, $array);
        }
        return null;
    }
}
