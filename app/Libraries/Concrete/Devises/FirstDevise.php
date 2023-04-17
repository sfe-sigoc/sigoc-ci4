<?php

namespace App\Libraries\Concrete\Devises;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_codeDevise;
use App\Libraries\Traits\TraitBase;
use App\Models\DEVISEModel;

class FirstDevise extends RequeteBase implements _codeDevise
{
    use TraitBase;
    const FILTRE_RECHERCHE = [
        'EST_VISA', 'COTER'
    ];
    public function __construct()
    {
        // parent::setModelBase(DEVISEModel::class);
        parent::__construct(DEVISEModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
    }
    function _codeDevise($CODE_DEVISE, array $array = null)
    {
        $array1 = ['CODE_DEVISE' => $CODE_DEVISE];
        $array1 = array_merge($array1,  $this->_extract($array)); // $this->_extract($array));
        return  $this->_first($array1);
    }
}