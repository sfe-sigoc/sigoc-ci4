<?php

namespace App\Libraries\Concrete\DomiciliationExiste;

use App\Libraries\Concrete\DemandeDomiciliations\AgenceBanqueDemDom;
use App\Libraries\Concrete\Domiciliations\ACsDomiciliation;
use App\Libraries\Strategy\_domiciliationExiste;

class AgenceBanqueDomiciliationExiste implements _domiciliationExiste
{
    public function _domiciliationExiste($domiciliation = null, array $array = null)
    {
        if (isset($domiciliation)) {
            $agences = new AgenceBanqueDemDom();
            return $agences->_idDemandeDomiciliation($domiciliation->ID_DEMANDE_DOMICILIATION, $array);
        }
        return null;
    }
}
