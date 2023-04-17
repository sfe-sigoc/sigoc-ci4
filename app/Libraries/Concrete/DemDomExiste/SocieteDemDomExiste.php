<?php

namespace App\Libraries\Concrete\DemDomExiste;

use App\Libraries\Concrete\Societes\FirstSociete;
use App\Libraries\Strategy\_demDomExiste;

class SocieteDemDomExiste implements _demDomExiste
{
    public function _demDomExiste($demande = null, array $array = null)
    {
        if (isset($demande)) {
            $demDoms = new FirstSociete();
            return $demDoms->_Societe($demande->NIF, $array);
        }
    }
}
