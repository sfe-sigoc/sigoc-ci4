<?php

namespace App\Libraries\Concrete\Domiciliations;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\ListeDemDom\ACsListeApurements;
use app\Libraries\Concrete\RegimeRapatriements\ApurementDomiciliation;


class ACsApureDomiciliation extends RequeteBase
{
    private $filtreDom = null;

    public function __construct(array $filtreDom = null)
    {
        $this->filtreDom = $filtreDom;
    }

    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $apurements = new ApurementDomiciliation();
        $listeApurements = $apurements->_numeroDomiciliation($NUMERO_DOMICILIATION,  $this->filtreDom);
        $aCsListeApurements = new ACsListeApurements();
        return $aCsListeApurements->_listeApurementsExiste($listeApurements, $array);
    }
}
