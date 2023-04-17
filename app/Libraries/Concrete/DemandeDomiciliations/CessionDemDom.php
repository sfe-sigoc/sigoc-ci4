<?php

namespace App\Libraries\Concrete\DemandeDomiciliations;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\DomiciliationExiste\CessionDomiciliationExiste;
use App\Libraries\Strategy\_idDemandeDomiciliation;

class CessionDemDom extends RequeteBase implements _idDemandeDomiciliation
{
    private $filtreDemDom = null;

    public function __construct(array $filtreDemDom = null)
    {
        $this->filtreDemDom = $filtreDemDom;
    }
    public function _idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION, array $array = null)
    {
        $domiciliations = new DomiciliationDemDom();
        $domiciliation = $domiciliations->_idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION, $this->filtreDemDom);
        $cessionDomiciliationExiste = new CessionDomiciliationExiste();
        return $cessionDomiciliationExiste->_domiciliationExiste($domiciliation, $array);
    }
}
