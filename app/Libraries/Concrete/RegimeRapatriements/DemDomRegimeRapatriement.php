<?php

namespace App\Libraries\Concrete\RegimeRapatriements;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_codeRegimeRapatriement;
use App\Libraries\Traits\TraitBase;
use App\Models\DemandeDomiciliationModel;

class DemDomRegimeRapatriement extends RequeteBase implements _codeRegimeRapatriement
{

    use TraitBase;

    const FILTRE_RECHERCHE = [
        'TYPE_DEMANDE',
        'CODE_STATUT',
        'ANNEE',
        'ACCEPT_PERCEPTION',
        'EST_CREATION_OPERATEUR',
        'NO_PAIEMENT_ETR'
    ];

    public function __construct()
    {
        parent::__construct(DemandeDomiciliationModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION_DEMANDE');
    }

    public function _codeRegimeRapatriement($CODE_REGIME_RAPATRIEMENT, array $array = null)
    {
        $array1 = [
            'CODE_REGIME_RAPATRIEMENT' => $CODE_REGIME_RAPATRIEMENT
        ];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findAll($array1);
    }
}
