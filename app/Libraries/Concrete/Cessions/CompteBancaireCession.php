<?php

namespace App\Libraries\Concrete\Cessions;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\AvisDeCreditExiste\CompteBancaireACsExiste;
use App\Libraries\Strategy\_idCession;
use App\Libraries\Traits\TraitBase;

class CompteBancaireCession  implements _idCession
{
    private $filtreACs = null;
    public function __construct(array $filtreACs = null)
    {
        $this->filtreACs = $filtreACs;
    }
    public function _idCession($ID_CESSION, array $array = null)
    {
        $aCsCessions = new ACsCession();
        $aCsCession = $aCsCessions->_idCession($ID_CESSION,  $this->filtreACs);
        $compteBancaireACsExiste = new CompteBancaireACsExiste();
        return $compteBancaireACsExiste->_avisDeCreditExiste($aCsCession, $array);
    }
}
