<?php

namespace App\Libraries\Concrete\DemandeDomiciliations;

use App\Libraries\Strategy\_idDemandeDomiciliation;
use App\Libraries\Traits\TraitBase;
use App\Models\AvisDeCreditModel;
use App\Libraries\Concrete\Apurements\ACsApurement;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\DomiciliationExiste\ACsDomiciliationExiste;
use App\Libraries\Strategy\_listeApurements;

class ACsApureDemDom extends RequeteBase implements _idDemandeDomiciliation
{

    use TraitBase;
    private $filtreDom = null;

    public function __construct(array $filtreDom = null)
    {
        $this->filtreDom = $filtreDom;
    }

    public function _idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION, array $filtreAC = null)
    {
        $domiciliations = new DomiciliationDemDom();
        $domiciliation = $domiciliations->_idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION, $this->filtreDom);
        $ACs = new ACsDomiciliationExiste();
        return $ACs->_domiciliationExiste($domiciliation, $filtreAC);
    }
}
