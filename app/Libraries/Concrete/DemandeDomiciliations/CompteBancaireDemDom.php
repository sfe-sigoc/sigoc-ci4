<?php

namespace App\Libraries\Concrete\DemandeDomiciliations;

use App\Libraries\Strategy\_idDemandeDomiciliation;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\DemDomExiste\AgenceBanqueDemDomExiste;
use App\Libraries\Concrete\DemDomExiste\CompteBancaireDemDomExiste;

class CompteBancaireDemDom extends RequeteBase implements _idDemandeDomiciliation
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
        $compteBancaireDemDomExiste = new CompteBancaireDemDomExiste();
        return $compteBancaireDemDomExiste->_demDomExiste($demande, $array);
    }
}
