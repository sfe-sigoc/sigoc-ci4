<?php

namespace App\Libraries\Concrete\Cessions;

use App\Libraries\Concrete\Apurements\DomiciliationApurementExiste;
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
        $apurements = new ApurementCession();
        $apurement = $apurements->_idCession($ID_CESSION, $this->filtreCession);
        $domiciliationApurementExiste = new DomiciliationApurementExiste();
        return $domiciliationApurementExiste->_apurementExiste($apurement, $array);
    }
}
