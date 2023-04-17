<?php

namespace App\Libraries\Concrete\Cessions;

use App\Libraries\Concrete\AvisDeCreditExiste\ApurementACsExiste;
use App\Libraries\Concrete\AvisDeCredits\ApurementACs;
use App\Libraries\Concrete\AvisDeDebitExiste\ACsCessionExiste;
use App\Libraries\Strategy\_idCession;

class ApurementCession implements _idCession
{
    private $filtreCession = null;
    public function __construct(array $filtreCession = null)
    {
        $this->filtreCession = $filtreCession;
    }
    public function _idCession($ID_CESSION, array $array = null)
    {
        $avis = new ACsCession();
        $cession = $avis->_idCession($ID_CESSION, $this->filtreCession);
        $apurementACsExiste = new ApurementACsExiste();
        return $apurementACsExiste->_avisDeCreditExiste($cession, $array);
    }
}
