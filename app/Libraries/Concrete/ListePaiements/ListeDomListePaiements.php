<?php

namespace App\Libraries\Concrete\ListePaiements;

use App\Libraries\Abstrait\ListePaiements;
use App\Libraries\Concrete\Domiciliations\PaiementsDomiciliation;

class ListeDomListePaiements extends ListePaiements
{
    public function _listePaiements($listeDomiciliations, array $array = null)
    {
        if (isset($listeDomiciliations) && !empty($listeDomiciliations)) {
            $domiciliation = new PaiementsDomiciliation();
            $array_domiciliations = array_unique(array_column($listeDomiciliations, 'NUMERO_DOMICILIATION'));
            $array_paiements = array_map(fn ($item) => $domiciliation->_numeroDomiciliation($item, $array), $array_domiciliations);
            return array_filter(array_merge(...$array_paiements));
        }
        return null;
    }
}
