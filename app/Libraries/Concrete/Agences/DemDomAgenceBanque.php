<?php

namespace App\Libraries\Concrete\Agences;

use App\Libraries\Abstrait\RequeteBase;
use App\Libraries\Strategy\_AgenceBanque;
use App\Libraries\Traits\TraitBase;
use App\Models\DemandeDomiciliationModel;

class DemDomAgenceBanque extends RequeteBase implements _AgenceBanque
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
    function _AgenceBanque($CODE_BANQUE = null, $CODE_AGENCE = null, array $array = null)
    {
        $array1 = ['AGENCE_CODE_BANQUE' => $CODE_BANQUE, 'CODE_AGENCE' => $CODE_AGENCE];
        $array =  $array ?? ['ANNEE' => date("Y")];
        $array = array_key_exists('ANNEE',  $array) ?  $array : array_merge($array, ['ANNEE' => date("Y")]);
        $array1 = array_merge($array1,  $this->_extract($array));
        return  $this->_findall($array1);
    }
}
