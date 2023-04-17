<?php

namespace App\Libraries\Concrete\CompteBancaires;

use App\Libraries\Strategy\_CompteBancaire;
use App\Libraries\Traits\TraitBase;
use App\Libraries\Abstrait\RequeteBase;
use App\Models\AvisDeDebitModel;

class ADsCompteBancaire extends RequeteBase implements _CompteBancaire
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
        $this->setColDate('DATE_AVIS_DEBIT');
    }

    public function _CompteBancaire($CODE_BANQUE, $CODE_AGENCE, $NUMERO_COMPTE, array $array = null)
    {
        $array1 = [
            'CODE_BANQUE' => $CODE_BANQUE,
            'CODE_AGENCE' => $CODE_AGENCE,
            'NUMERO_COMPTE' => $NUMERO_COMPTE
        ];
        // $array1 = array_merge($array1, $this->_extract($array));
        $array1 = array_merge($array1, ...$this->_extract($array));
        return $this->_findAll($array1);
    }
}
