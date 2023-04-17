<?php

namespace App\Libraries\Concrete\Agences;

use App\Libraries\Strategy\_AgenceBanque;
use App\Libraries\Traits\TraitBase;
use App\Models\CompteBancaireModel;
use App\Libraries\Abstrait\RequeteBase;

class CompteBancaireAgenceBanque extends RequeteBase implements _AgenceBanque
{

    use TraitBase;

    const FILTRE_RECHERCHE = [
        'CLOTURER',
        'VALIDE_BANQUE',
        'ANNEE'
    ];

    public function __construct()
    {
        parent::__construct(CompteBancaireModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION');
    }

    public function _AgenceBanque($CODE_BANQUE = null, $CODE_AGENCE = null, array $array = null)
    {
        $array1 = [
            'AGENCE_CODE_BANQUE' => $CODE_BANQUE,
            'CODE_AGENCE' => $CODE_AGENCE
        ];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findall($array1);
    }
}
