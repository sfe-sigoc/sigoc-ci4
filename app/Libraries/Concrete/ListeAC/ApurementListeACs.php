<?php

namespace App\Libraries\Concrete\ListeAC;

use App\Libraries\Abstrait\ListeACs;
use App\Libraries\Concrete\AvisDeCredits\ApurementACs;

class ApurementListeACs extends ListeACs
{
    public function _listeACs($listeAvisDeCredits, array $array = null)
    {
        if (isset($listeAvisDeCredits) && !empty($listeAvisDeCredits)) {
            $array_NUMERO_AVIS_CREDIT = array_unique(array_column($listeAvisDeCredits, 'NUMERO_AVIS_CREDIT'));
            $apurements = new ApurementACs();
            $array_apurements = array_merge(...array_map(fn ($item) => $apurements->_numeroAvisDeCredit($item, $array), $array_NUMERO_AVIS_CREDIT));
        }
        return array_filter($array_apurements);
    }
}
