<?php

namespace App\Libraries\Concrete\Domiciliations;

use App\Libraries\Strategy\_numeroDomiciliation;
use App\Libraries\Traits\TraitBase;
use App\Libraries\Abstrait\RequeteBase;
use App\Models\PaiementImportModel;

class PaiementsDomiciliation extends RequeteBase implements _numeroDomiciliation
{

    use TraitBase;

    const FILTRE_RECHERCHE = [
        'ANNEE'
    ];

    public function __construct()
    {
        parent::__construct(PaiementImportModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_PAIEMENT');
    }

    public function _numeroDomiciliation($NUMERO_DOMICILIATION, array $array = null)
    {
        $array1 = [
            'NUMERO_DOMICILIATION' => $NUMERO_DOMICILIATION
        ];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findAll($array1);
    }
}
