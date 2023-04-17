<?php

namespace App\Libraries\Concrete\apurements;


use App\Libraries\Strategy\_idApurement;
use App\Libraries\Traits\TraitBase;
use App\Models\BanqueModel;

use App\Libraries\Abstrait\RequeteBase;

use App\Libraries\Concrete\AvisDeCredits\ApurementACs;
use App\Libraries\Concrete\ListeDemDom\DomiciliationsListeApurements;
use App\Libraries\Strategy\_numeroAvisDeCredit;

class DomiciliationACs extends RequeteBase implements _numeroAvisDeCredit
{
    private $filtreACs = [];

    public function __construct(array $filtreACs = null)
    {
        $this->filtreACs = $filtreACs;
    }

    public function _numeroAvisDeCredit($NUMERO_AVIS_CREDIT, array $array = null)
    {
        $apurements = new ApurementACs();
        $avis = $apurements->_numeroAvisDeCredit($NUMERO_AVIS_CREDIT, $this->filtreACs);
        $domiciliations = new DomiciliationsListeApurements();
        return $domiciliations->_listeApurementsExiste($avis, $array);
    }
}
