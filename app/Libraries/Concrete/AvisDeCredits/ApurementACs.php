<?php

namespace App\Libraries\Concrete\AvisDeCredits;

use App\Libraries\Strategy\_numeroAvisDeCredit;
use App\Libraries\Traits\TraitBase;
use App\Models\ApurementModel;
use App\Libraries\Abstrait\RequeteBase;

class ApurementACs extends RequeteBase implements _numeroAvisDeCredit
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

    public function _numeroAvisDeCredit($NUMERO_AVIS_CREDIT, array $array = null)
    {
        $array1 = ['NUMERO_AVIS_CREDIT' => $NUMERO_AVIS_CREDIT];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findAll($array1);
    }
}
