<?php
namespace App\Libraries\Concrete\Banques;

use App\Libraries\Strategy\_Banque;
use App\Libraries\Traits\TraitBase;
use App\Models\DemandeDomiciliationModel;
use App\Libraries\Abstrait\RequeteBase;

class DemDomBanque extends RequeteBase implements _Banque
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

    public function _Banque($CODE_BANQUE, array $array = null)
    {
        $array1 = [
            'AGENCE_CODE_BANQUE' => $CODE_BANQUE
        ];
        $array1 = array_merge($array1, $this->_extract($array));
        return $this->_findAll($array1);
    }
}

