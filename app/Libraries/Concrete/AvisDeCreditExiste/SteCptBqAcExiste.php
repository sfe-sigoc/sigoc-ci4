<?php

namespace App\Libraries\Concrete\AvisDeCreditExiste;

use App\Libraries\Concrete\CompteBancaires\SocieteCompteBancaire;
use App\Libraries\Strategy\_avisDeCreditExiste;

class SteCptBqAcExiste implements _avisDeCreditExiste
{
    public function _avisDeCreditExiste($avis = null, array $array = null)
    {
        if (isset($avis)) {
            $societes = new SocieteCompteBancaire();
            return $societes->_CompteBancaire($avis->AGENCE_CODE_BANQUE, $avis->CODE_AGENCE, $avis->NUMERO_COMPTE, $array);
        }
        return null;
    }
}
