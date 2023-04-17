<?php

namespace App\Libraries\Concrete\Banques;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_Banque;
use App\Libraries\Traits\TraitBase;
use App\Models\BanqueModel;

class FirstBanque extends RequeteBase implements _Banque
{
    use TraitBase;
    const FILTRE_RECHERCHE = [
        'TYPE_BANQUE', 'ACTIF'
    ];
    public function __construct()
    {
        parent::__construct(BanqueModel::class);
        // parent::setModelBase(BanqueModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
    }
    public function _Banque($CODE_BANQUE, array $array = null)
    {
        $array1 = ['CODE_BANQUE' => $CODE_BANQUE];
        $array1 = array_merge($array1,  $this->_extract($array));
        return $this->_findAll($array1);
    }
}
