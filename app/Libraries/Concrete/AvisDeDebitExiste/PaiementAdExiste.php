<?php

namespace App\Libraries\Concrete\AvisDeDebitExiste;

use App\Libraries\Strategy\_avisDeDebitExiste;
use App\Libraries\Concrete\AvisDeDebits\FirstAvisDebit;

class PaiementAdExiste implements _avisDeDebitExiste
{
    public function _avisDeDebitExiste($paiement = null, array $array = null)
    {
        if (isset($paiement)) {
            $avis = new FirstAvisDebit();
            return $avis->_referenceAvisDebit($paiement->REFERENCE_AVIS_DEBIT, $array);
        }
        return null;
    }
}
