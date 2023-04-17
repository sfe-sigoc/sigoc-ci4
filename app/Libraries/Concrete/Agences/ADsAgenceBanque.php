<?php

namespace App\Libraries\Concrete\Agences;

use App\Libraries\Strategy\_AgenceBanque;
use App\Libraries\Traits\TraitBase;
use App\Libraries\Abstrait\RequeteBase;
use App\Models\AvisDeDebitModel;

class ADsAgenceBanque extends RequeteBase implements _AgenceBanque
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
        $this->setColDate('DATE_AVIS_CREDIT');
    }

    public function _AgenceBanque($CODE_BANQUE = null, $CODE_AGENCE = null, array $array = null)
    {
        $array1 = [
            'CODE_BANQUE' => $CODE_BANQUE,
            'CODE_AGENCE' => $CODE_AGENCE
        ];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findAll($array1);
    }
}