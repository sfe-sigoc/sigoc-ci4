<?php

namespace App\Libraries\Concrete\AvisDeCredits;


use App\Libraries\Strategy\_numeroAvisDeCredit;
use App\Libraries\Traits\TraitBase;
use App\Models\BanqueModel;
use App\Libraries\Concrete\Banques\FirstBanque;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\AvisDeCreditExiste\AgenceBanqueACsExiste;
use App\Libraries\Strategy\_avisDeCreditExiste;
use App\Libraries\Concrete\AvisDeCreditExiste\BanqueAcExiste;

class AgenceBanqueACs extends RequeteBase implements _numeroAvisDeCredit
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
        $banque = new AgenceBanqueACsExiste();
        return $banque->_avisDeCreditExiste($avis, $array);
    }
}
