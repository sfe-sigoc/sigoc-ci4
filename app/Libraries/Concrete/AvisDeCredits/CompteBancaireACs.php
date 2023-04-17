<?php

namespace App\Libraries\Concrete\AvisDeCredits;


use App\Libraries\Strategy\_numeroAvisDeCredit;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\AvisDeCreditExiste\BanqueAcExiste;
use App\Libraries\Concrete\AvisDeCreditExiste\CompteBancaireACsExiste;

class BanqueACs extends RequeteBase implements _numeroAvisDeCredit
{

    private $filtreACs = [];

    public function __construct(array $filtreACs = null)
    {
        $this->filtreACs = $filtreACs;
    }

    public function _numeroAvisDeCredit($NUMERO_AVIS_CREDIT, array $array = null)
    {
        $avisDeCredits = new FirstAvisDeCredit();
        $avis = $avisDeCredits->_numeroAvisDeCredit($NUMERO_AVIS_CREDIT, $this->filtreACs);
        $banque = new CompteBancaireACsExiste();
        return $banque->_avisDeCreditExiste($avis, $array);
    }
}
