<?php

namespace App\Libraries\Concrete\DemDomExiste;

use App\Libraries\Concrete\CompteBancaires\FirstCompteBancaire;
use App\Libraries\Strategy\_demDomExiste;

class CompteBancaireDemDomExiste implements _demDomExiste
{
    public function _demDomExiste($demande = null, array $filtreCompteBancaire = null)
    {
        if (isset($demande) && !empty($demande)) {
            $cptBq = new FirstCompteBancaire();
            return $cptBq->_CompteBancaire($demande->AGENCE_CODE_BANQUE, $demande->CODE_AGENCE, $demande->NUMERO_COMPTE, $filtreCompteBancaire);
        }
        return null;
    }
}
