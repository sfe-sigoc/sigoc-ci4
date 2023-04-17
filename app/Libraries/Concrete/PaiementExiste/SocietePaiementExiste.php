<?php

namespace App\Libraries\Concrete\PaiementExiste;

use App\Libraries\Concrete\CompteBancaires\SocieteCompteBancaire;
use App\Libraries\Strategy\_paiementExiste;

class SocietePaiementExiste implements _paiementExiste
{
    public function _paiementExiste($paiement = null, array $array = null)
    {
        if (isset($paiement)) {
            $societe = new SocieteCompteBancaire();
            return $societe->_CompteBancaire($paiement->CODE_BANQUE, $paiement->CODE_AGENCE, $paiement->NUMERO_COMPTE, $array);
        }
        return null;
    }
}
