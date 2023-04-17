<?php

namespace App\Libraries\Concrete\Agences;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_AgenceBanque;
use App\Libraries\Traits\TraitBase;
use App\Models\AgenceBanqueModel;

class FirstAgenceBanque extends RequeteBase implements _AgenceBanque
{
    use TraitBase;

    const FILTRE_RECHERCHE = [
        'ACTIF'
    ];

    public function __construct()
    {
        parent::__construct(AgenceBanqueModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
    }

    // traiter le cas Avis de Debit Code_banque avec dataMap
    function _AgenceBanque($CODE_BANQUE = null, $CODE_AGENCE = null, array $array = null)
    {
        $array1 = [
            'AGENCE_CODE_BANQUE' => $CODE_BANQUE,
            'CODE_AGENCE' => $CODE_AGENCE
        ];
        $array1 = array_filter($array1);
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_first($array1);
    }
}
