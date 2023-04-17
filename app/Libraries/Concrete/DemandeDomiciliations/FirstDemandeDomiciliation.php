<?php

namespace App\Libraries\Concrete\DemandeDomiciliations;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_idDemandeDomiciliation;
use App\Libraries\Traits\TraitBase;
use App\Models\DemandeDomiciliationModel;

class FirstDemandeDomiciliation extends RequeteBase implements _idDemandeDomiciliation
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
        // parent::setModelBase(DemandeDomiciliationModel::class);
        parent::__construct(DemandeDomiciliationModel::class);
        $this->setColNames(self::FILTRE_RECHERCHE);
        $this->setColDate('DATE_CREATION_DEMANDE');
    }

    public function _idDemandeDomiciliation($ID_DEMANDE_DOMICILIATION, array $array = null)
    {
        $array1 = [
            'ID_DEMANDE_DOMICILIATION' => $ID_DEMANDE_DOMICILIATION
        ];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_first($array1);
    }
}
