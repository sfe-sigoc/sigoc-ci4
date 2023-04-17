<?php

namespace App\Libraries\Concrete\Apurements;

use App\Libraries\Strategy\_idApurement;
use App\Libraries\Traits\TraitBase;
use App\Models\AvisDeCreditModel;
use App\Libraries\Concrete\AvisDeCredits\FirstAvisDeCredit;
use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_apurementExiste;

class ACsApurement extends RequeteBase implements _idApurement
{
    private $filtreApurement = null;
    use TraitBase;

    const FILTRE_RECHERCHE = [
        'CODE_TYPE_AVIS',
        'DEVISE_AVIS_CREDIT',
        'EST_CEDER',
        'VALIDE',
        'PRESCRIT',
        'CRDOM',
        'INFRACTION_SANS_AMENDE',
        'PASSER_MID',
        'APURER_PAR_TRANSACTION',
        'IS_FAKE_SCAN',
        'IGNORE_CESSION',
        'FAKE_SCAN_DONE'
    ];

    public function __construct(array $filtreApurement = null)
    {
        $this->filtreApurement = $filtreApurement;
    }

    public function _idApurement($ID_APUREMENT, array $array = null)
    {
        $apurements = new FirstApurement();
        $apurement = $apurements->_idApurement($ID_APUREMENT, $this->filtreApurement);
        $aCsApurementExiste = new ACsApurementExiste();
        return $aCsApurementExiste->_apurementExiste($apurement, $array);
    }
}
