<?php

namespace App\Libraries\Concrete\AvisDeCredits;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_numeroAvisDeCredit;
use App\Libraries\Traits\TraitBase;
use App\Models\AvisDeCreditModel;

class FindAllAvisDeCredit extends RequeteBase implements _numeroAvisDeCredit
{
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
    public function __construct()
    {
        parent::__construct(AvisDeCreditModel::class);
        $this->setColDate('DATE_AVIS_CREDIT');
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_AVIS_CREDIT');
    }
    public function _numeroAvisDeCredit($NUMERO_AVIS_CREDIT, array $array = null)
    {
        $array1 = ['NUMERO_AVIS_CREDIT' => $NUMERO_AVIS_CREDIT];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findAll($array1);
    }
}
