<?php

namespace App\Libraries\Concrete\CompteBancaires;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_CompteBancaire;
use App\Libraries\Traits\TraitBase;
use App\Models\CompteBancaireModel;

class FirstCompteBancaire extends RequeteBase implements _CompteBancaire
{
    use TraitBase;
    const FILTRE_RECHERCHE = [
        'CLOTURER', 'VALIDE_BANQUE', 'ANNEE'
    ];
    public function __construct()
    {
        // parent::setModelBase(CompteBancaireModel::class);
        parent::__construct(CompteBancaireModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION');
    }
    public function _CompteBancaire($CODE_BANQUE,  $CODE_AGENCE,  $NUMERO_COMPTE, array $array = null)
    {
        $array1 = ['AGENCE_CODE_BANQUE' => $CODE_BANQUE, 'CODE_AGENCE' => $CODE_AGENCE, 'NUMERO_COMPTE' => $NUMERO_COMPTE];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_first($array1);
    }
}