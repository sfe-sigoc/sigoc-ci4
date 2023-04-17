<?php

namespace App\Libraries\Abstrait;

use App\Libraries\Concrete\Paiements\ACsApurement;

abstract class ListePaiements
{
    public function _listePaiementsExiste($listePaiements = null, array $array = null)
    {
        if (isset($listePaiements) && !empty($listePaiements)) {
            return $this->_listePaiements($listePaiements, $array);
        }
        return null;
    }
    abstract public function _listePaiements($listePaiements, array $array = null);
}
