<?php

namespace App\Libraries\Concrete\Domiciliations;

use App\Libraries\Traits\TraitBase;
use App\Models\BanqueModel;
use App\Libraries\Concrete\Domiciliations\DemDomDomiciliation;
use App\Libraries\Strategy\_numeroDomiciliation;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Concrete\AvisDeCreditExiste\CessionAvisDeCreditExiste;
use App\Libraries\Concrete\DemDomExiste\BanqueDemDomExiste;
use app\Libraries\Concrete\RegimeRapatriements\ApurementDomiciliation;

class CessionDomiciliation extends RequeteBase  implements _numeroDomiciliation
{
    private $filtreDom = null;


    public function __construct(array $filtreDom = null)
    {
        $this->filtreDom = $filtreDom;
    }

    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $avis = new ACsApureDomiciliation();
        $avisDeCredit = $avis->_numeroDomiciliation($NUMERO_DOMICILIATION,  $this->filtreDom);
        $cessionAvisDeCreditExiste = new CessionAvisDeCreditExiste();
        return $cessionAvisDeCreditExiste->_avisDeCreditExiste($avisDeCredit, $array);
    }
}
