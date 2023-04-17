<?php

namespace App\Libraries\Concrete\AvisDeCredits;

use App\Libraries\Strategy\_numeroAvisDeCredit;
use App\Libraries\Traits\TraitBase;
use App\Libraries\Abstrait\RequeteBase;
use App\Models\CessionModel;

class CessionACs extends RequeteBase implements _numeroAvisDeCredit
{

    use TraitBase;

    const FILTRE_RECHERCHE = [
        'ANNEE'
    ];

    public function __construct()
    {
        parent::__construct(CessionModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CESSION');
    }

    public function _numeroAvisDeCredit($NUMERO_AVIS_CREDIT, array $array = null)
    {
        $array1 = ['NUMERO_AVIS_CREDIT' => $NUMERO_AVIS_CREDIT];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findAll($array1);
    }
}
