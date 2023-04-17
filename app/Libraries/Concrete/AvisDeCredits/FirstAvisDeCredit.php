<?php

namespace App\Libraries\Concrete\AvisDeCredits;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_numeroAvisDeCredit;
use App\Libraries\Traits\TraitBase;
use App\Models\AvisDeCreditModel;

class FirstAvisDeCredit extends RequeteBase implements _numeroAvisDeCredit
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
        // parent::setModelBase(AvisDeCreditModel::class);
        parent::__construct(AvisDeCreditModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_AVIS_CREDIT');
    }
    public function _numeroAvisDeCredit($NUMERO_AVIS_CREDIT, array $array = null)
    {
        $array1 = ['NUMERO_AVIS_CREDIT' => $NUMERO_AVIS_CREDIT];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_first($array1);
    }
}