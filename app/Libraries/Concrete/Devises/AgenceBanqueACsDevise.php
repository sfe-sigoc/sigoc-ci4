<?php

namespace App\Libraries\Concrete\Devises;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\Agences\FindAllAgenceBanque;
use App\Libraries\Concrete\Agences\FirstAgenceBanque;
use App\Libraries\Concrete\ListeAC\AgenceBanqueListeACs;
use App\Libraries\Strategy\_codeDevise;
use App\Libraries\Traits\TraitBase;
use App\Models\AvisDeCreditModel;

class AgenceBanqueACsDevise extends RequeteBase implements _codeDevise
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
        $agenceBanqueListeACs = new AgenceBanqueListeACs();
        return $agenceBanqueListeACs->_listeACsExiste($listeACs, $array);
    }
}
