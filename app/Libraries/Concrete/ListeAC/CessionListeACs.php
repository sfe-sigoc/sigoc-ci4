<?php

namespace App\Libraries\Concrete\ListeAC;

use App\Libraries\Abstrait\ListeACs;
use App\Libraries\Concrete\AvisDeCredits\CessionACs;

class CessionListeACs extends ListeACs
{
    public function _listeACs($listeAvisDeCredits, array $array = null)
    {
        if (isset($listeAvisDeCredits) && !empty($listeAvisDeCredits)) {
            $array_NUMERO_AVIS_CREDIT = array_unique(array_column($listeAvisDeCredits, 'NUMERO_AVIS_CREDIT'));
            $cessions = new CessionACs();
            $array_cessions = array_merge(...array_map(fn ($item) => $cessions->_numeroAvisDeCredit($item, $array), $array_NUMERO_AVIS_CREDIT));
        }
        return array_filter($array_cessions);
    }
}
