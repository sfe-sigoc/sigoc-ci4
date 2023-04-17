<?php

namespace App\Libraries\Concrete\CompteBancaires;

use App\Libraries\Strategy\_CompteBancaire;
use App\Libraries\Traits\TraitBase;
use App\Models\DemandeDomiciliationModel;
use App\Libraries\Abstrait\RequeteBase;

class DemDomCompteBancaire extends RequeteBase implements _CompteBancaire
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

    public function _CompteBancaire($CODE_BANQUE,  $CODE_AGENCE, $NUMERO_COMPTE, array $array = null)
    {
        $array1 = [
            'AGENCE_CODE_BANQUE' => $CODE_BANQUE,
            'CODE_AGENCE' => $CODE_AGENCE,
            'NUMERO_COMPTE' => $NUMERO_COMPTE
        ];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findAll($array1);
    }
}
