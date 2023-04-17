<?php

namespace App\Libraries\Abstrait;

use App\Libraries\Concrete\AvisDeCredits\ApurementACs;

abstract class ListeACs
{
    public function _listeACsExiste($listeAvisDeCredits = null, array $array = null)
    {
        if (isset($listeAvisDeCredits) && !empty($listeAvisDeCredits)) {
            return $this->_listeACs($listeAvisDeCredits, $array);
        }
        return null;
    }
    abstract public function _listeACs($listeAvisDeCredits, array $array = null);
}
