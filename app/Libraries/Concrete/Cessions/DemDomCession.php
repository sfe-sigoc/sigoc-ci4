<?php

namespace App\Libraries\Concrete\Cessions;

use App\Libraries\Concrete\Apurements\DomiciliationApurementExiste;
use App\Libraries\Concrete\DomiciliationExiste\DemDomDomiciliationExiste;
use App\Libraries\Strategy\_idCession;

class DomiciliationCession implements _idCession
{
    private $filtreCession = null;
    public function __construct(array $filtreCession = null)
    {
        $this->filtreCession = $filtreCession;
    }
    public function _idCession($ID_CESSION, array $array = null)
    {
        $domiciliations = new DomiciliationCession();
        $domiciliation = $domiciliations->_idCession($ID_CESSION, $this->filtreCession);
        $demDomDomiciliationExiste = new DemDomDomiciliationExiste();
        return $demDomDomiciliationExiste->_domiciliationExiste($domiciliation, $array);
    }
}
