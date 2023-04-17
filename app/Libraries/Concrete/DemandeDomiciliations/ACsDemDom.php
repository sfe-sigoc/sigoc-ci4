<?php

namespace App\Libraries\Concrete\DemandeDomiciliations;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\DomiciliationExiste\ACsDomiciliationExiste;
use App\Libraries\Concrete\Domiciliations\ACsDomiciliation;
use App\Libraries\Strategy\_idDemandeDomiciliation;
use App\Libraries\Traits\TraitBase;
use App\Models\DemandeDomiciliationModel;

class ACsDemDom extends RequeteBase implements _idDemandeDomiciliation
{
        private $filtreDemDom = null;

        public function __construct(array $filtreDemDom = null)
        {
                $this->filtreDemDom = $filtreDemDom;
        }
        public function _idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION, array $array = null)
        {
                $domiciliationDemDom = new DomiciliationDemDom();
                $domiciliation = $domiciliationDemDom->_idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION, $this->filtreDemDom);
                $aCsDomiciliation = new ACsDomiciliationExiste();
                return $aCsDomiciliation->_domiciliationExiste($domiciliation, $array);
        }
}
