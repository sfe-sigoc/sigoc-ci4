<?php

namespace App\Libraries\Concrete\DemandeDomiciliations;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\DemDomExiste\SocieteDemDomExiste;
use App\Libraries\Strategy\_idDemandeDomiciliation;

class SocieteDemDom extends RequeteBase implements _idDemandeDomiciliation
{
  private $filtreDemDom = null;

  public function __construct(array $filtreDemDom = null)
  {
    $this->filtreDemDom = $filtreDemDom;
  }
  public function _idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION, array $array = null)
  {
    $demandes = new FirstDemandeDomiciliation();
    $demande = $demandes->_idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION, $this->filtreDemDom);
    $societeDemDomExiste = new SocieteDemDomExiste();
    return $societeDemDomExiste->_demDomExiste($demande, $array);
  }
}
