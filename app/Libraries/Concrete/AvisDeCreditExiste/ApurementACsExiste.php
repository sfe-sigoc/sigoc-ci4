<?php

namespace App\Libraries\Concrete\AvisDeCreditExiste;

use App\Libraries\Concrete\Agences\FirstAgenceBanque;
use App\Libraries\Concrete\Apurements\FindAllApurement;
use App\Libraries\Concrete\AvisDeCredits\ApurementACs;
use App\Libraries\Concrete\Banques\FirstBanque;
use App\Libraries\Strategy\_avisDeCreditExiste;

class ApurementACsExiste implements _avisDeCreditExiste
{
    public function _avisDeCreditExiste($avis = null, array $array = null)
    {
        if (isset($avis)) {
            $apurements = new ApurementACs();
            return $apurements->_numeroAvisDeCredit($avis->NUMERO_AVIS_CREDIT,  $array);
        }
        return null;
    }
}
