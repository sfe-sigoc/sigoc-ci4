<?php

namespace App\Libraries\Concrete\apurements;


use App\Libraries\Strategy\_idApurement;
use App\Libraries\Traits\TraitBase;
use App\Models\BanqueModel;

use App\Libraries\Abstrait\RequeteBase;

use App\Libraries\Concrete\AvisDeCredits\ApurementACs;
use App\Libraries\Concrete\DomiciliationExiste\DemDomDomiciliationExiste;
use App\Libraries\Concrete\Domiciliations\DemDomDomiciliation;
use App\Libraries\Concrete\ListeDemDom\DomiciliationsListeApurements;
use App\Libraries\Strategy\_numeroAvisDeCredit;

class DemDomACs extends RequeteBase implements _numeroAvisDeCredit
{
    private $filtreACs = [];

    public function __construct(array $filtreACs = null)
    {
        $this->filtreACs = $filtreACs;
    }

    public function _numeroAvisDeCredit($NUMERO_AVIS_CREDIT, array $array = null)
    {
        $domiciliations = new DomiciliationACs();
        $domiciliation = $domiciliations->_numeroAvisDeCredit($NUMERO_AVIS_CREDIT, $this->filtreACs);
        $demDomDomiciliationExiste = new DemDomDomiciliationExiste();
        return $demDomDomiciliationExiste->_domiciliationExiste($domiciliation, $array);
    }
}
