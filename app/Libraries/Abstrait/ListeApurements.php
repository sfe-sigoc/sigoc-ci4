<?php

namespace App\Libraries\Abstrait;

use App\Libraries\Concrete\Paiements\ACsApurement;

abstract class ListeApurements
{
    public function _listeApurementsExiste($listeApurements = null, array $array = null)
    {
        if (isset($listeApurements) && !empty($listeApurements)) {
            return $this->_listeApurements($listeApurements, $array);
        }
        return null;
    }
    abstract  public function _listeApurements($listeApurements = null, array $array = null);
}
