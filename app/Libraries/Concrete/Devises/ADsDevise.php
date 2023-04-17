<?php

namespace App\Libraries\Concrete\Devises;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_codeDevise;
use App\Libraries\Traits\TraitBase;
use App\Models\AvisDeDebitModel;

class ADsDevise extends RequeteBase implements _codeDevise
{
    use TraitBase;
    const FILTRE_RECHERCHE = [
        'IS_FAKE_SCAN',
        'FAKE_SCAN_DONE',
        'RETOUR_FONDS',
        'ANNEE'
    ];
    public function __construct()
    {
        parent::__construct(AvisDeDebitModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
    }
    function _codeDevise($CODE_DEVISE, array $array = null)
    {
        $array1 = ['CODE_DEVISE' => $CODE_DEVISE];
        $array1 = array_merge($array1,  $this->_extract($array)); // $this->_extract($array));
        return  $this->_findAll($array1);
    }
}
