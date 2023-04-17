<?php

namespace App\Libraries\Concrete\DemandeDomiciliations;

use App\Libraries\Concrete\DemDomExiste\RegimeRapatDemDomExiste;

class RegimeRapatriementDemDom
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
        $regimeRapatDemDomExiste = new RegimeRapatDemDomExiste();
        return $regimeRapatDemDomExiste->_demDomExiste($demande, $array);
    }
}
