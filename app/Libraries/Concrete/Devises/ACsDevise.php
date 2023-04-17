<?php

namespace App\Libraries\Concrete\Devises;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_codeDevise;
use App\Libraries\Traits\TraitBase;
use App\Models\AvisDeCreditModel;

class ACsDevise extends RequeteBase implements _codeDevise
{
    use TraitBase;
    const FILTRE_RECHERCHE = [
        'ACTIF'
    ];
    public function __construct()
    {
        parent::__construct(AvisDeCreditModel::class);
        $this->setColDate('DATE_AVIS_CREDIT');
        $this->setColNames(self::FILTRE_RECHERCHE);
    }
    function _codeDevise($CODE_DEVISE, array $array = null)
    {
        $array1 = ['DEVISE_AVIS_CREDIT' => $CODE_DEVISE];
        $array1 = array_merge($array1,  $this->_extract($array)); // $this->_extract($array));
        return  $this->_findAll($array1);
    }
}
