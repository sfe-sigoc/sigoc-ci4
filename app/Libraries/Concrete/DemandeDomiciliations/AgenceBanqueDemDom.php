<?php

namespace App\Libraries\Concrete\DemandeDomiciliations;

use App\Libraries\Strategy\_idDemandeDomiciliation;
use App\Libraries\Traits\TraitBase;
use App\Models\AgenceBanqueModel;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\DemDomExiste\AgenceBanqueDemDomExiste;


class AgenceBanqueDemDom extends RequeteBase implements _idDemandeDomiciliation
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
        $agenceBanqueDemDomExiste = new AgenceBanqueDemDomExiste();
        return $agenceBanqueDemDomExiste->_demDomExiste($demande, $array);
    }
}
