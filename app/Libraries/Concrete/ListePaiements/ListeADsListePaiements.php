<?php

namespace App\Libraries\Concrete\ListePaiements;

use App\Libraries\Abstrait\ListePaiements;
use App\Libraries\Concrete\AvisDeDebits\FirstAvisDebit;

class ListeADsListePaiements extends ListePaiements
{
    public function _listePaiements($listePaiements, array $array = null)
    {
        if (isset($listePaiements) && !empty($listePaiements)) {
            $avisDebits = new FirstAvisDebit();
            $array_AvisDebits = array_unique(array_column($listePaiements, 'REFERENCE_AVIS_DEBIT'));
            $array_paiements = array_map(fn ($item) => $avisDebits->_referenceAvisDebit($item, $array), $array_AvisDebits);
            return array_filter(array_merge(...$array_paiements));
        }
        return null;
    }
}
