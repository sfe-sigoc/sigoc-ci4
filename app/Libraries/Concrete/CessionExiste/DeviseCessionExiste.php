<?php

namespace App\Libraries\Concrete\AvisDeDebitExiste;

use App\Libraries\Concrete\Devises\FirstDevise;
use App\Libraries\Strategy\_cessionExiste;

class DeviseCessionExiste implements _cessionExiste
{
    public function _cessionExiste($cession = null, array $array = null)
    {
        if (isset($cession)) {
            $devises = new FirstDevise();
            return $devises->_codeDevise($cession->CODE_DEVISE, $array);
        }
        return null;
    }
}
