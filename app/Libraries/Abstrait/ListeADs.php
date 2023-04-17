<?php

namespace App\Libraries\Abstrait;

use App\Libraries\Concrete\ADs\ApurementADs;

abstract class ListeADs
{
    public function _listeADsExiste($listeADs = null, array $array = null)
    {
        if (isset($listeADs) && !empty($listeADs)) {
            return $this->_listeADs($listeADs, $array);
        }
        return null;
    }
    abstract public function _listeADs($listeADs, array $array = null);
}
