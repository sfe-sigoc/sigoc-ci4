<?php

namespace App\Libraries\Concrete\CompteBancaires;

use App\Libraries\Strategy\_CompteBancaire;
use App\Libraries\Traits\TraitBase;
use App\Models\AvisDeCreditModel;
use App\Libraries\Abstrait\RequeteBase;

class ACsCompteBancaire extends RequeteBase implements _CompteBancaire
{

    use TraitBase;

    const FILTRE_RECHERCHE = [
        'CODE_TYPE_AVIS',
        'DEVISE_AVIS_CREDIT',
        'EST_CEDER',
        'VALIDE',
        'PRESCRIT',
        'CRDOM',
        'INFRACTION_SANS_AMENDE',
        'PASSER_MID',
        'APURER_PAR_TRANSACTION',
        'IS_FAKE_SCAN',
        'IGNORE_CESSION',
        'FAKE_SCAN_DONE',
        'ANNEE'
    ];

    public function __construct()
    {
        parent::__construct(AvisDeCreditModel::class);
        $this->setColDate('DATE_AVIS_CREDIT');
        $this->setColNames(self::FILTRE_RECHERCHE);
    }

    public function _CompteBancaire($CODE_BANQUE, $CODE_AGENCE, $NUMERO_COMPTE, array $array = null)
    {
        $array1 = [
            'AGENCE_CODE_BANQUE' => $CODE_BANQUE,
            'CODE_AGENCE' => $CODE_AGENCE,
            'NUMERO_COMPTE' => $NUMERO_COMPTE
        ];
        $array1 = array_merge($array1, $this->_extract($array));
        // $array1 = array_merge($array1, ...$this->_extract($array));
        print_r($array1);
        return $this->_findAll($array1);
    }
}
