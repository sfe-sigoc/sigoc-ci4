<?php

namespace App\Libraries\Concrete\DemandeDomiciliations;

use App\Libraries\Strategy\_idDemandeDomiciliation;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\DemDomExiste\BanqueDemDomExiste;

class BanqueDemDom extends RequeteBase implements _idDemandeDomiciliation
{
    private $filtreDemDom = null;

    public function __construct(array $filtreDemDom = null)
    {
        $this->filtreDemDom = $filtreDemDom;
    }

    public function _idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION, array $array = null)
    {
        $demDoms = new FirstDemandeDomiciliation();
        $demande = $demDoms->_idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION, $this->filtreDemDom);
        $banqueDemDomExiste = new BanqueDemDomExiste();
        return $banqueDemDomExiste->_demDomExiste($demande, $array);
    }
}
