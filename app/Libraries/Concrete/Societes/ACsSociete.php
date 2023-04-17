<?php

namespace App\Libraries\Concrete\Societes;

use App\Libraries\Strategy\_Societe;
use App\Libraries\Traits\TraitBase;
use App\Models\AvisDeCreditModel;
use App\Libraries\Abstrait\RequeteBase;

class ACsSociete extends RequeteBase implements _Societe
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
        'FAKE_SCAN_DONE'
    ];

    public function __construct()
    {
        parent::__construct(AvisDeCreditModel::class);
        $this->setColDate('DATE_AVIS_CREDIT');
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_AVIS_CREDIT');
    }

    public function _Societe($NIF, array $array = null)
    {
        $array1 = [
            'NIF' => $NIF
        ];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findAll($array1);
    }
}
