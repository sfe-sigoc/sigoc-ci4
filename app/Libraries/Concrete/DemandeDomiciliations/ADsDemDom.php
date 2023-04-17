<?php

namespace App\Libraries\Concrete\DemandeDomiciliations;

use App\Libraries\Strategy\_idDemandeDomiciliation;
use App\Libraries\Traits\TraitBase;
use App\Models\AvisDeCreditModel;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\DomiciliationExiste\ADsDomiciliationExiste;


class ADsDemDom extends RequeteBase implements _idDemandeDomiciliation
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
        $paiementDomiciliationExiste = new ADsDomiciliationExiste();
        return $paiementDomiciliationExiste->_domiciliationExiste($domiciliation, $array);
    }
}
