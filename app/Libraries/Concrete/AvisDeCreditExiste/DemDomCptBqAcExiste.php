<?php

namespace App\Libraries\Concrete\AvisDeCreditExiste;

use App\Libraries\Concrete\CompteBancaires\DemDomCompteBancaire;
use App\Libraries\Strategy\_avisDeCreditExiste;

class DemDomCptBqAcExiste implements _avisDeCreditExiste
{
    public function _avisDeCreditExiste($avis = null, array $array = null)
    {
        if (isset($avis)) {
            $demandes = new DemDomCompteBancaire();
            return $demandes->_CompteBancaire($avis->AGENCE_CODE_BANQUE, $avis->CODE_AGENCE, $avis->NUMERO_COMPTE, $array);
        }
        return null;
    }
}
