<?php

namespace App\Libraries\Concrete\Devises;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\ListeAC\ApurementListeACs;
use App\Libraries\Strategy\_codeDevise;

class ApurementDevise extends RequeteBase implements _codeDevise
{
    private $filtreACs = null;

    public function __construct(array $filtreACs = null)
    {
        $this->filtreACs = $filtreACs;
    }
    function _codeDevise($CODE_DEVISE, array $array = null)
    {
        $ACsDevises = new ACsDevise();
        $listeACs = $ACsDevises->_codeDevise($CODE_DEVISE, $this->filtreACs);
        $agenceBanqueListeACs = new ApurementListeACs();
        return $agenceBanqueListeACs->_listeACsExiste($listeACs, $array);
    }
}
