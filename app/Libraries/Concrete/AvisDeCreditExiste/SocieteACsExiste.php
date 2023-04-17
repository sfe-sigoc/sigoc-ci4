<?php

namespace App\Libraries\Concrete\AvisDeCreditExiste;

use App\Libraries\Concrete\Societes\FirstSociete;
use App\Libraries\Strategy\_avisDeCreditExiste;

class SocieteACsExiste implements _avisDeCreditExiste
{
    public function _avisDeCreditExiste($avis = null, array $array = null)
    {
        if (isset($avis)) {
            $societes = new FirstSociete();
            return $societes->_Societe($avis->NIF, $array);
        }
        return null;
    }
}
