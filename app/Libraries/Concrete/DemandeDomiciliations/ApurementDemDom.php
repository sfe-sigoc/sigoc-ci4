<?php

namespace App\Libraries\Concrete\DemandeDomiciliations;

use App\Libraries\Strategy\_idDemandeDomiciliation;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\DomiciliationExiste\ApurementDomiciliationExiste;

class ApurementDemDom extends RequeteBase implements _idDemandeDomiciliation
{
    private $filtreDemDom = null;

    public function __construct(array $filtreDemDom = null)
    {
        $this->filtreDemDom = $filtreDemDom;
    }

    public function _idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION, array $array = null)
    {
        $domiciliations = new DomiciliationDemDom();
        $domiciliation = $domiciliations->_idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION,  $this->filtreDemDom);
        $apurementDomiciliationExiste = new ApurementDomiciliationExiste();
        return $apurementDomiciliationExiste->_domiciliationExiste($domiciliation, $array);
    }
}
