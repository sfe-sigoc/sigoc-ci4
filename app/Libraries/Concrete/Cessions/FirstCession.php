<?php

namespace App\Libraries\Concrete\Cessions;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_idCession;
use App\Libraries\Traits\TraitBase;
use App\Models\CessionModel;

class FirstCession extends RequeteBase implements _idCession
{
    use TraitBase;
    const FILTRE_RECHERCHE = [
        'ANNEE'
    ];
    public function __construct()
    {
        // parent::setModelBase(CessionModel::class);
        parent::__construct(CessionModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CESSION');
    }
    public function _idCession($ID_CESSION, array $array = null)
    {
        $array1 = ['ID_CESSION' => $ID_CESSION];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_first($array1);
    }
}
