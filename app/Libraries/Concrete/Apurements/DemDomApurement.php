<?php

namespace App\Libraries\Concrete\Apurements;

use App\Libraries\Strategy\_idApurement;
use App\Libraries\Traits\TraitBase;
use App\Models\BanqueModel;
use App\Libraries\Concrete\Banques\FirstBanque;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_avisDeCreditExiste;
use App\Libraries\Concrete\AvisDeCreditExiste\BanqueAcExiste;
use App\Libraries\Concrete\DomiciliationExiste\DemDomDomiciliationExiste;

class DemDomApurement extends RequeteBase implements _idApurement
{
    private $filtreDom = [];


    public function __construct(array $filtreDom = null)
    {
        $this->filtreDom = $filtreDom;
    }

    public function _idApurement($ID_APUREMENT, array $array = null)
    {
        $domiciliationApurements = new DomiciliationApurement();
        $domiciliation = $domiciliationApurements->_idApurement($ID_APUREMENT, $array);
        $demDomDomiciliationExiste = new DemDomDomiciliationExiste();
        return $demDomDomiciliationExiste->_domiciliationExiste($domiciliation, $this->filtreDom);
    }
}
