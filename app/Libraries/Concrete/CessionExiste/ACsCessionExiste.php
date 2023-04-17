<?php

namespace App\Libraries\Concrete\AvisDeDebitExiste;

use App\Libraries\Concrete\AvisDeCredits\FirstAvisDeCredit;
use App\Libraries\Strategy\_cessionExiste;

class ACsCessionExiste implements _cessionExiste
{
    public function _cessionExiste($cession = null, array $array = null)
    {
        if (isset($cession)) {
            $avis = new FirstAvisDeCredit();
            return $avis->_numeroAvisDeCredit($cession->NUMERO_AVIS_CREDIT, $array);
        }
        return null;
    }
}
