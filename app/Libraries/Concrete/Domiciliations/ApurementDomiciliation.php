<?php

namespace app\Libraries\Concrete\RegimeRapatriements;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Traits\TraitBase;
use App\Models\ApurementModel;

class ApurementDomiciliation extends RequeteBase
{
    use TraitBase;

    const FILTRE_RECHERCHE = [
        'ANNEE'
    ];

    public function __construct()
    {
        parent::__construct(ApurementModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_APUREMENT');
    }
    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $array1 = ['NUMERO_DOMICILIATION' => $NUMERO_DOMICILIATION];
        $array1 = array_merge($array1,  $this->_extract($array)); // $this->_extract($array));
        return  $this->_first($array1);
    }
}
