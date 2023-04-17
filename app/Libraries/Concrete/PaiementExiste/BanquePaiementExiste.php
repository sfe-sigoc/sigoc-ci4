<?php

namespace App\Libraries\Concrete\PaiementExiste;

use App\Libraries\Concrete\Agences\FirstBanque;
use App\Libraries\Concrete\Banques\FirstBanque as BanquesFirstBanque;
use App\Libraries\Strategy\_paiementExiste;

class BanquePaiementExiste implements _paiementExiste
{
    public function _paiementExiste($paiement = null, array $array = null)
    {
        if (isset($paiement)) {
            $Banque = new BanquesFirstBanque();
            return $Banque->_Banque($paiement->CODE_BANQUE, $array);
        }
        return null;
    }
}
