<?php

namespace App\Libraries\Concrete\ListeDemDom;

use App\Libraries\Abstrait\ListeDemDoms;
use App\Libraries\Concrete\DemandeDomiciliations\DomiciliationDemDom;

class DomiciliationsListeDemDoms extends ListeDemDoms
{
    public function _listeDemDoms($listeDemandes, array $array  = null)
    {
        if (isset($listeDemandes) && !empty($listeDemandes)) {
            $array_ID_DEMANDE_DOMICILIATION = array_column($listeDemandes, 'ID_DEMANDE_DOMICILIATION');
            $domiciliations = new DomiciliationDemDom();
            $array_domiciliations = array_map(fn ($item) => $domiciliations->_idDemandeDomiciliation($item, $array), $array_ID_DEMANDE_DOMICILIATION);
            return array_filter($array_domiciliations);
            // return array_unique(array_filter($agenceBanques), SORT_REGULAR);
        }
        return null;
    }
}
